<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AssessmentResult;
use App\Models\GodsGiftTest;
use App\Models\PendingRequests;
use App\Models\Superadmin;
use App\Models\Taker;
use App\Models\Tests;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DataController extends Controller
{

    public function getAllUsers()
    {

        $superadmin_id = auth()->user()->id;

        $superadmins = Superadmin::where('id', '!=', $superadmin_id)->get();

        // Retrieve superadmin with their admins and users
        $clients = User::all();
        $admins = Admin::all();

        return [
            'admins' => $admins,
            'clients' => $clients,
            'superadmins' => $superadmins
        ];
    }

    public function showTotalUsers()
    {
        $data = $this->getAllUsers();

        $totalSuperadmins = $data['superadmins']->count();
        $totalAdmins = $data['admins']->count();
        $totalClients = $data['clients']->count();
        $totalUsers = $totalAdmins + $totalClients + $totalSuperadmins;

        return view('users.superadmin.dashboard', compact('totalSuperadmins', 'totalAdmins', 'totalClients', 'totalUsers'));
    }

    public function showAllUsers()
    {
        $data = $this->getAllUsers();

        $superadmins = $data['superadmins'];
        $admins = $data['admins'];
        $clients = $data['clients'];
        $users = $admins->concat($clients)->concat($superadmins);

        return view('users.superadmin.users', compact('superadmins', 'admins', 'clients', 'users'));
    }

    public function showResults()
    {
        $user = Auth::user();
        $user_id = $user->id;

        Log::info('Showing results for User ID:', ['user_id' => $user_id]);

        $results = $this->getTestResult();
        $resultList = $this->getResultsList();

        return view('users.client.dashboard', compact('results', 'resultList'));
    }

    public function getTestResult()
    {
        $result_data = $this->getLatestResults();

        if (!$result_data) {
            // Handle the case where no result data is found
            Log::info('No test result found for user.');
            return null;
        }

        $testable_id = $result_data->tests_id;
        $godsGift = GodsGiftTest::find($testable_id);

        Log::info('Gods Gift Test retrieved:', ['godsGiftData' => $godsGift]);

        if (!$godsGift) {
            // Handle the case where GodsGiftTest is not found
            Log::info('Gods Gift Test not found for testable_id: ' . $testable_id);
            return null;
        }

        $weaknesses = $godsGift->weaknesses;
        $strengths = $godsGift->strengths;

        $results = [
            'strengths' => $strengths,
            'weaknesses' => $weaknesses
        ];

        return $results;
    }

    public function getLatestResults()
    {

        $user = Auth::user();
        $user_id = $user->id;
        $admin = $user->admin_id;

        Log::info('Retrieving latest results for User ID:', ['user_id' => $user_id, 'admin_id' => $admin]);

        $getTestData = AssessmentResult::where('user_id', $user_id)
            ->where('admin_id', $admin)
            ->orderBy('created_at', 'desc')
            ->with('client', 'admin', 'assess_type', 'test')
            ->first();

        // dd($getTestData->id);

        Log::info('Retrieved Test Data:', ['test_data' => $getTestData]);

        return $getTestData;
    }

    public function getResultsList()
    {
        $user = auth()->user();
        $user_id = $user->id;
        $admin = $user->admin_id;

        // dd($user_id);

        return AssessmentResult::where('user_id', $user_id)
            ->get();
    }

    public function showRequests()
    {
        $requests = $this->getRequests();

        return view('users.admin.pending-requests', compact('requests'));
    }

    public function showDashboardData()
    {
        $requests = $this->getRequests();
        $takers = $this->getTakers();
        $takers_count = $this->getTotalTakers();
        $clients_count = $this->getTotalClients();

        return view('users.admin.dashboard', compact('requests', 'takers', 'takers_count', 'clients_count'));
    }

    public function showClients()
    {
        $clients = $this->getClients();

        return view('users.admin.clients', compact('clients'));
    }

    public function getRequests()
    {
        $admin = auth()->user()->id;

        return PendingRequests::where('admin_id', $admin)->with('client')->get();
    }

    //to be changed
    public function getTakers()
    {
        $admin = auth()->user()->id;

        return Taker::where('admin_id', $admin)
            ->with('client', 'assess_type')
            ->get();
    }

    public function getTotalTakers()
    {
        $admin = auth()->user()->id;

        return Taker::where('admin_id', $admin)->count();
    }

    public function getClients()
    {
        $admin = auth()->user()->id;

        return User::where('admin_id', $admin)->get();
    }

    public function getTotalClients()
    {
        $admin = auth()->user()->id;

        return User::where('admin_id', $admin)->count();
    }

    public function getAssessmentList()
    {

        $user = auth()->user()->id;

        return AssessmentResult::where('user_id', $user)
            ->with('assess_type', 'admin')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function showAssessmentList()
    {
        $tests = $this->getAssessmentList();
        // dd($tests);

        return view('users.client.assessments-list', compact('tests'));
    }

    public function getPdf($data)
    {
        return Pdf::loadView('pdf.results', $data);
    }

    public function showResultPdf($id)
    {

        $data = $this->getResultPdf($id);

        $assessment_pdf = $this->getPdf($data);

        // Stream the PDF in the browser
        return $assessment_pdf->stream('assessment_result.pdf');

    }

    public function printResultPdf($id)
    {
        $data = $this->getResultPdf($id);

        $assessment_pdf = $this->getPdf($data);

        // Stream the PDF in the browser
        return $assessment_pdf->download('assessment_result.pdf');

    }

    public function getResultPdf($id)
    {
        $result = AssessmentResult::findOrFail($id);

        $user = $result->client;
        $admin = $result->admin;

        $tests_id = $result->tests_id;
        $testable_id = Tests::findOrFail($tests_id);
        $testResults = $this->getResult($testable_id);

        $data = [
            'test_name' => $user->name ?? '',
            'givenName' => $user->givenName ?? '',
            'middleName' => $user->middle_initial ?? '',
            'lastName' => $user->lastName,
            'sex' => $user->sex,
            'birthday' => $user->birthday->format('F j, Y'),
            'created_at' => $result->created_at->format('m/d/Y g:iA'),
            'age' => $user->birthday->diffInYears(now()),
            'civilStat' => $user->civilStat,
            'religion' => $user->religion,
            'address' => $user->address,
            'cpNumber' => $user->cpNumber,
            'admin_name' => $admin->full_name,
            'testResults' => $testResults
        ];

        return $data;
    }

    public function getResult($result_data)
    {

        if (!$result_data) {
            // Handle the case where no result data is found
            Log::info('No test result found for user.');
            return null;
        }

        $testable_id = $result_data->id;
        $godsGift = GodsGiftTest::find($testable_id);

        Log::info('Gods Gift Test retrieved:', ['godsGiftData' => $godsGift]);

        if (!$godsGift) {
            // Handle the case where GodsGiftTest is not found
            Log::info('Gods Gift Test not found for testable_id: ' . $testable_id);
            return null;
        }

        $weaknesses = $godsGift->weaknesses;
        $strengths = $godsGift->strengths;

        $results = [
            'strengths' => $strengths,
            'weaknesses' => $weaknesses
        ];

        return $results;
    }

    public function showClientResult($id)
    {
        $data = $this->getClientResult($id);

        if(!$data)
        {
            return redirect()->back()->with('error', 'No assessment record found.');
        }
        else {
            $assessment_pdf = $this->getPdf($data);

            // Stream the PDF in the browser
            return $assessment_pdf->stream('assessment_result.pdf');
        }
    }

    public function printClientResult($id)
    {
        $data = $this->getClientResult($id);

        if(!$data)
        {
            return redirect()->back()->with('error', 'No assessment record found.');
        }
        else {
            $assessment_pdf = $this->getPdf($data);

            // Stream the PDF in the browser
            return $assessment_pdf->download('assessment_result.pdf');
        }
    }

    public function getClientResult($id)
    {
        //CLIENT AND ADMIN ID
        $client = User::findOrFail($id);
        $admin = $client->admin_id;

        //GET LATEST TEST RESULT OF THE CLIENT
        $result = AssessmentResult::where('user_id', $client->id)
            ->where('admin_id', $admin)
            ->orderBy('created_at', 'desc')
            ->first();

        // Handle the case where no result data is found
        if (!$result) {
            Log::info('No test result found for user with ID: ' . $client->id);
            return null;
        }

        $testResults = $this->getClientLatest($result);

        $data = [
            'test_name' => $result->test->name ?? '',
            'givenName' => $result->client->givenName ?? '',
            'middleName' => $result->client->middle_initial ?? '',
            'lastName' => $result->client->lastName,
            'sex' => $result->client->sex,
            'birthday' => $result->client->birthday->format('F j, Y'),
            'created_at' => $result->created_at->format('m/d/Y g:iA'),
            'age' => $result->client->birthday->diffInYears(now()),
            'civilStat' => $result->client->civilStat,
            'religion' => $result->client->religion,
            'address' => $result->client->address,
            'cpNumber' => $result->client->cpNumber,
            'admin_name' => $result->admin->full_name,
            'testResults' => $testResults
        ];

        return $data;
    }

    public function getClientLatest($latestResult)
    {

        // Handle the case where no result data is found
        if (!$latestResult) {
            Log::info('No test result found for user.');
            return null;
        }

        $test_id = $latestResult->tests_id;
        $godsGift = GodsGiftTest::find($test_id);

        Log::info('Gods Gift Test retrieved:', ['godsGiftData' => $godsGift]);

        if (!$godsGift) {
            // Handle the case where GodsGiftTest is not found
            Log::info('Gods Gift Test not found for testable_id: ' . $test_id);
            return null;
        }

        $weaknesses = $godsGift->weaknesses;
        $strengths = $godsGift->strengths;

        $results = [
            'strengths' => $strengths,
            'weaknesses' => $weaknesses
        ];

        return $results;
    }

}
