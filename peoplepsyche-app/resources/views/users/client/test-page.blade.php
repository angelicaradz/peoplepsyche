{{-- NOTE: TO BE MODIFIED
IF NAA NA ANG
UBAN TESTS! --}}

@extends('layout.test-page')

@section('title')
    Assessment |
@endsection

@section('test-title')
    God's Gift Assessment
@endsection

@section('test-content')
    {{-- GET USER SEX INFO --}}
    <div id="user-info" data-sex="{{ Auth::user()->sex }}"></div>

    {{-- TEST FORM --}}
    <form id="godsGiftTest" action={{ route('godsGift') }} method="POST">
        @csrf

        <!-- ASSESSMENT DESCRIPTION -->
        <div class="row mx-4 my-5 justify-content-start align-items-center">
            <p class="fw-bold">THIS BOOKLET CONTAINS SOME QUESTIONS ABOUT YOUR INTERESTS & HOW YOU FEEL ABOUT THINGS. STUDY THE EXAMPLE QUESTIONS THOROUGHLY BEFORE PROCEEDING TO THE ACTUAL TEST.
            </p>
        </div>

        <!-- ABOUT RELIGION ASSESSMENT SECTION -->
        <div class="row mx-4 my-5 justify-content-start">

            <!-- INSTRUCTIONS -->
            <p>
                <span class="fw-bold">Instructions:</span>
            </p>
            <ol class="fw-bold" style="padding-left: 50px;">
                <li>If you are a Christian, ANSWER ONLY Example  X for christians.</li>
                <li>If you are a Muslim, ANSWER ONLY Example X for Muslims.</li>
                <li>If you belong to other group categories (NOT a christian nor a Muslim), ANSWER THE Example X FOR YOUR GROUP.</li>
                <li>If your answer is a, then select A. If your answer is b, select B. If your answer is c, select C.</li>
            </ol>
            <p class="fw-bold mt-4" style="padding-left: 50px;">TRY ANSWERING NOW & SHADE THE LETTER REPRESENTING YOUR ANSWER:</p>

            <!-- EXAMPLE QUESTIONS -->

            <!-- EXAMPLE X -->
            <fieldset>

                <!-- QUESTION X1 -->
                <fieldset>
                    <p class="fw-bold mt-4" style="padding-left: 50px;">Example X. &emsp; <span style="color: red;">FOR CHRISTIANS:</span></p>
                    <p style="padding-left: 100px;">I LOVE CELEBRATING CHRISTMAS.</p>

                    <!-- QUESTION X1 CHOICES -->
                    <ol style="padding-left: 100px;" type="a">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="x1" id="x1_a" value="a">
                            <label class="form-check-label" for="x1_a">
                                <li class="mx-4 fw-bold">&ensp; True</li>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="x1" id="x1_b" value="b">
                            <label class="form-check-label" for="x1_b">
                                <li class="mx-4 fw-bold">&ensp; ?</li>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="x1" id="x1_c" value="c">
                            <label class="form-check-label" for="x1_c">
                                <li class="mx-4 fw-bold">&ensp; False</li>
                            </label>
                        </div>
                    </ol>
                </fieldset>

                <!-- QUESTION X2 -->
                <fieldset>
                    <p class="fw-bold mt-4" style="padding-left: 50px;">Example X. &emsp; <span style="color: red;">FOR MUSLIMS:</span></p>
                    <p style="padding-left: 100px;">I LOVE CELEBRATING EID AL-FITR.</p>

                    <!-- QUESTION X2 CHOICES -->
                    <ol style="padding-left: 100px;" type="a">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="x2" id="x2_a" value="a">
                            <label class="form-check-label" for="x2_a">
                                <li class="mx-4 fw-bold">&ensp; True</li>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="x2" id="x2_b" value="b">
                            <label class="form-check-label" for="x2_b">
                                <li class="mx-4 fw-bold">&ensp; ?</li>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="x2" id="x2_c" value="c">
                            <label class="form-check-label" for="x2_c">
                                <li class="mx-4 fw-bold">&ensp; False</li>
                            </label>
                        </div>
                    </ol>
                </fieldset>

                <!-- QUESTION X3 -->
                <fieldset>
                    <p class="fw-bold mt-4" style="padding-left: 50px;">Example X. &emsp; <span style="color: red;">FOR OTHER GROUPS:</span></p>
                    <p style="padding-left: 100px;">I LOVE MOST OF THE CELEBRATIONS PRACTICED BY OUR GROUP.</p>

                    <!-- QUESTION X3 CHOICES -->
                    <ol style="padding-left: 100px;" type="a">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="x3" id="x3_a" value="a">
                            <label class="form-check-label" for="x3_a">
                                <li class="mx-4 fw-bold">&ensp; True</li>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="x3" id="x3_b" value="b">
                            <label class="form-check-label" for="x3_b">
                                <li class="mx-4 fw-bold">&ensp; ?</li>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="x3" id="x3_c" value="c">
                            <label class="form-check-label" for="x3_c">
                                <li class="mx-4 fw-bold">&ensp; False</li>
                            </label>
                        </div>
                    </ol>
                </fieldset>
            </fieldset>

            <!-- EXAMPLE Y -->
            <fieldset>
                <p class="fw-bold mt-4" style="padding-left: 50px;">
                    Then, proceed to Example Y & answer accordingly. This time, there are no more categories. All of you should answer Example Y.
                </p>
                <p class="mt-4" style="padding-left: 50px;"><span class="fw-bold">Example Y. </span>&emsp; GENERALLY, I PREFER CELEBRATIONS THAT ARE:</p>

                <!-- QUESTION Y CHOICES -->
                <ol style="padding-left: 100px;" type="a">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="y" id="y_a" value="a">
                        <label class="form-check-label" for="y_a">
                            <li class="mx-4 fw-bold">&ensp; solemn/quiet</li>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="y" id="y_b" value="b">
                        <label class="form-check-label" for="y_b">
                            <li class="mx-4 fw-bold">&ensp; ?</li>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="y" id="y_c" value="c">
                        <label class="form-check-label" for="y_c">
                            <li class="mx-4 fw-bold">&ensp; lively/noisy</li>
                        </label>
                    </div>
                </ol>
            </fieldset>
        </div>

        <!-- 170 ITEMS ASSESSMENT INSTRUCTIONS-->
        <div class="row mx-4 my-5 justify-content-start">
            <p>
                AFTER ANSWERING THE EXAMPLE QUESTIONS, GET READY TO BEGIN THE ACTUAL TEST & REMEMBER THE FOLLOWING:
            </p>
            <ol style="padding-left: 50px;">
                <li class="mb-2">READ EACH STATEMENT & CHOOSE THE ONE THAT BEST DESCRIBES YOU. BE HONEST: ANSWER ONLY WHAT IS TRUE FOR YOU.</li>
                <li class="mb-2">ANSWER EVERY QUESTION. DON&apos;T SKIP ANY. IF YOU WANT TO CHANGE AN ANSWER, FEEL FREE TO DO SO. YOUR FIRST ANSWER WILL BE AUTOMATICALLY DELETED ONCE YOU CHANGE IT BY SHADING/MARKING A NEW ANSWER IN THE SAME NUMBER/ITEM.</li>
                <li>IF POSSIBLE, CHOOSE ONLY “A” OR “C” FOR YOUR ANSWER. HOWEVER, YOU ARE ALLOWED TO SELECT “B” &lpar;REPRESENTED BY A QUESTION MARK [?] IN THE MIDDLE OF A & C&rpar; IF YOU CANNOT CHOOSE BETWEEN “A” OR C”.</li>
            </ol>
            <p style="padding-left: 50px;"><i>THANK YOU.</i></p>
        </div>
        <div class="row mx-4 my-5 justify-content-start">
            <h5 class="fw-bold">NO TIME LIMIT FOR THIS TEST.</h5>
        </div>
        <hr class="mx-4 my-5" style="border-style: dashed; border-width: 1px;">

        <!-- 170 ITEMS ASSESSMENT SECTION -->
        <div class="row mx-4 my-5 justify-content-start">
            <h5 class="fw-bold">BEGIN HERE.</h5>

            <!-- 170 TEST QUESTIONS -->
            <fieldset>
                <ol style="margin-left: 30px;">

                    <!-- QUESTION NO. 1 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LOVE BEING A TEACHER THAN BEING AN ENGINEER.</p>

                            <!-- QUESTION NO. 1 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" id="q1_a" value="a">
                                    <label class="form-check-label" for="q1_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" id="q1_b" value="b">
                                    <label class="form-check-label" for="q1_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" id="q1_c" value="c">
                                    <label class="form-check-label" for="q1_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 2 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN SOMETHING MAKES ME FEEL BAD/ANGRY, I CAN CALM DOWN & RECOVER QUITE EASILY.</p>

                            <!-- QUESTION NO. 2 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" id="q2_a" value="a">
                                    <label class="form-check-label" for="q2_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" id="q2_b" value="b">
                                    <label class="form-check-label" for="q2_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" id="q2_c" value="c">
                                    <label class="form-check-label" for="q2_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 3 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN SOMEONE DOES SOMETHING THAT TROUBLES ME, I :</p>

                            <!-- QUESTION NO. 3 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q3" id="q3_a" value="a">
                                    <label class="form-check-label" for="q3_a">
                                        <li class="mx-4 fw-bold">&ensp; let it pass</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q3" id="q3_b" value="b">
                                    <label class="form-check-label" for="q3_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q3" id="q3_c" value="c">
                                    <label class="form-check-label" for="q3_c">
                                        <li class="mx-4 fw-bold">&ensp; call their attention</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 4 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM A BELIEVER IN:</p>

                            <!-- QUESTION NO. 4 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q4" id="q4_a" value="a">
                                    <label class="form-check-label" for="q4_a">
                                        <li class="mx-4 fw-bold">&ensp; being serious in everything I do</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q4" id="q4_b" value="b">
                                    <label class="form-check-label" for="q4_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q4" id="q4_c" value="c">
                                    <label class="form-check-label" for="q4_c">
                                        <li class="mx-4 fw-bold">&ensp; enjoying life while I still can</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 5 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I&apos;D RATHER STAY IN A PLACE WHERE:</p>

                            <!-- QUESTION NO. 5 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q5" id="q5_a" value="a">
                                    <label class="form-check-label" for="q5_a">
                                        <li class="mx-4 fw-bold">&ensp; rules are strict</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q5" id="q5_b" value="b">
                                    <label class="form-check-label" for="q5_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q5" id="q5_c" value="c">
                                    <label class="form-check-label" for="q5_c">
                                        <li class="mx-4 fw-bold">&ensp; rules are not that strict</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 6 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LOVE GROUP TOURS OR SOCIAL EVENTS WITH FRIENDS.</p>

                            <!-- QUESTION NO. 6 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q6" id="q6_a" value="a">
                                    <label class="form-check-label" for="q6_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q6" id="q6_b" value="b">
                                    <label class="form-check-label" for="q6_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q6" id="q6_c" value="c">
                                    <label class="form-check-label" for="q6_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 7 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I APPRECIATE MORE:</p>

                            <!-- QUESTION NO. 7 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q7" id="q7_a" value="a">
                                    <label class="form-check-label" for="q7_a">
                                        <li class="mx-4 fw-bold">&ensp; one who has average abilities but disciplined</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q7" id="q7_b" value="b">
                                    <label class="form-check-label" for="q7_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q7" id="q7_c" value="c">
                                    <label class="form-check-label" for="q7_c">
                                        <li class="mx-4 fw-bold">&ensp; one very talented but may not be very disciplined</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 8 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I ENJOY:</p>

                            <!-- QUESTION NO. 8 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q8" id="q8_a" value="a">
                                    <label class="form-check-label" for="q8_a">
                                        <li class="mx-4 fw-bold">&ensp; Creating, doing or building something</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q8" id="q8_b" value="b">
                                    <label class="form-check-label" for="q8_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q8" id="q8_c" value="c">
                                    <label class="form-check-label" for="q8_c">
                                        <li class="mx-4 fw-bold">&ensp; Reading, daydreaming or indulging in fantasy</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 9 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN I JOIN NEW GROUPS, I SEEM TO ADJUST EASILY.</p>

                            <!-- QUESTION NO. 9 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q9" id="q9_a" value="a">
                                    <label class="form-check-label" for="q9_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q9" id="q9_b" value="b">
                                    <label class="form-check-label" for="q9_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q9" id="q9_c" value="c">
                                    <label class="form-check-label" for="q9_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 10 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LOVE KOREAN DRAMA.</p>

                            <!-- QUESTION NO 10 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q10" id="q10_a" value="a">
                                    <label class="form-check-label" for="q10_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q10" id="q10_b" value="b">
                                    <label class="form-check-label" for="q10_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q10" id="q10_c" value="c">
                                    <label class="form-check-label" for="q10_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO 11 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHAT PEOPLE SAY THEY’LL DO & WHAT THEY ACTUALLY DO, DIFFER.</p>

                            <!-- QUESTION NO 11 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q11" id="q11_a" value="a">
                                    <label class="form-check-label" for="q11_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q11" id="q11_b" value="b">
                                    <label class="form-check-label" for="q11_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q11" id="q11_c" value="c">
                                    <label class="form-check-label" for="q11_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 12 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I&apos;M SLIGHTLY ABSENTMINDED & IMPRACTICAL.</p>

                            <!-- QUESTION NO 12 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q12" id="q12_a" value="a">
                                    <label class="form-check-label" for="q12_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q12" id="q12_b" value="b">
                                    <label class="form-check-label" for="q12_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q12" id="q12_c" value="c">
                                    <label class="form-check-label" for="q12_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 13 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;SOME PEOPLE WILL SECRETLY SAY BAD THINGS ABOUT YOU JUST TO GET AHEAD.</p>

                            <!-- QUESTION NO 13 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q13" id="q13_a" value="a">
                                    <label class="form-check-label" for="q13_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q13" id="q13_b" value="b">
                                    <label class="form-check-label" for="q13_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q13" id="q13_c" value="c">
                                    <label class="form-check-label" for="q13_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 14 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I SOMETIMES GET INTO CONFLICT BECAUSE I  FOLLOW MY OWN IDEAS W/O CONSULTING OTHERS WHO ARE PART OF THE GROUP.</p>

                            <!-- QUESTION NO. 14 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q14" id="q14_a" value="a">
                                    <label class="form-check-label" for="q14_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q14" id="q14_b" value="b">
                                    <label class="form-check-label" for="q14_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q14" id="q14_c" value="c">
                                    <label class="form-check-label" for="q14_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 15 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IT IS EASY FOR ME TO TALK ABOUT MY LIFE & THINGS THAT OTHERS MIGHT CONSIDER PERSONAL & CONFIDENTIAL.</p>

                            <!-- QUESTION NO. 15 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q15" id="q15_a" value="a">
                                    <label class="form-check-label" for="q15_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q15" id="q15_b" value="b">
                                    <label class="form-check-label" for="q15_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q15" id="q15_c" value="c">
                                    <label class="form-check-label" for="q15_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 16 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LOVE HELPING OTHER PEOPLE.</p>

                            <!-- QUESTION NO. 16 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q16" id="q16_a" value="a">
                                    <label class="form-check-label" for="q16_a">
                                        <li class="mx-4 fw-bold">&ensp; Always</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q16" id="q16_b" value="b">
                                    <label class="form-check-label" for="q16_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q16" id="q16_c" value="c">
                                    <label class="form-check-label" for="q16_c">
                                        <li class="mx-4 fw-bold">&ensp; Sometimes</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 17 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;FOR MANY PEOPLE, MY THOUGHTS ARE TOO DEEP & DIFFICULT TO COMPREHEND.</p>

                            <!-- QUESTION NO. 17 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q17" id="q17_a" value="a">
                                    <label class="form-check-label" for="q17_a">
                                        <li class="mx-4 fw-bold">&ensp; Hardly ever or rarely</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q17" id="q17_b" value="b">
                                    <label class="form-check-label" for="q17_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q17" id="q17_c" value="c">
                                    <label class="form-check-label" for="q17_c">
                                        <li class="mx-4 fw-bold">&ensp; Often</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 18 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I PREFER TO:</p>

                            <!-- QUESTION NO. 18 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q18" id="q18_a" value="a">
                                    <label class="form-check-label" for="q18_a">
                                        <li class="mx-4 fw-bold">&ensp; Open my problems/concerns to people I trust</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q18" id="q18_b" value="b">
                                    <label class="form-check-label" for="q18_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q18" id="q18_c" value="c">
                                    <label class="form-check-label" for="q18_c">
                                        <li class="mx-4 fw-bold">&ensp; Keep them as secret to myself.</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 19 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I TEND TO BE TOO TOUCHY & THINK TOO MUCH ABOUT SOMETHING I&apos;VE DONE.</p>

                            <!-- QUESTION NO. 19 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q19" id="q19_a" value="a">
                                    <label class="form-check-label" for="q19_a">
                                        <li class="mx-4 fw-bold">&ensp; Hardly ever or rarely</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q19" id="q19_b" value="b">
                                    <label class="form-check-label" for="q19_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q19" id="q19_c" value="c">
                                    <label class="form-check-label" for="q19_c">
                                        <li class="mx-4 fw-bold">&ensp; Often</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 20 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LIKE PEOPLE WHO ARE:</p>

                            <!-- QUESTION NO. 20 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q20" id="q20_a" value="a">
                                    <label class="form-check-label" for="q20_a">
                                        <li class="mx-4 fw-bold">&ensp; Polite when they talk</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q20" id="q20_b" value="b">
                                    <label class="form-check-label" for="q20_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q20" id="q20_c" value="c">
                                    <label class="form-check-label" for="q20_c">
                                        <li class="mx-4 fw-bold">&ensp; Direct/Frank when they talk</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 21 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN I COULD SENSE SOMEONE DISLIKES ME:</p>

                            <!-- QUESTION NO. 21 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q21" id="q21_a" value="a">
                                    <label class="form-check-label" for="q21_a">
                                        <li class="mx-4 fw-bold">&ensp; I don&apos;t mind it at all</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q21" id="q21_b" value="b">
                                    <label class="form-check-label" for="q21_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q21" id="q21_c" value="c">
                                    <label class="form-check-label" for="q21_c">
                                        <li class="mx-4 fw-bold">&ensp; I feel hurt</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 22 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;NEW STRATEGIES ARE BETTER COMPARED TO OLD STRATEGIES THAT WORK.</p>

                            <!-- QUESTION NO. 22 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q22" id="q22_a" value="a">
                                    <label class="form-check-label" for="q22_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q22" id="q22_b" value="b">
                                    <label class="form-check-label" for="q22_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q22" id="q22_c" value="c">
                                    <label class="form-check-label" for="q22_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 23 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I UTTERED WORDS THAT HURT OTHER PEOPLES&apos; EGO.</p>

                            <!-- QUESTION NO. 23 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q23" id="q23_a" value="a">
                                    <label class="form-check-label" for="q23_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q23" id="q23_b" value="b">
                                    <label class="form-check-label" for="q23_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q23" id="q23_c" value="c">
                                    <label class="form-check-label" for="q23_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 24 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IT IS BEST TO FOLLOW EXACT DETAILED DIRECTIONS WHEN DOING SOMETHING:</p>

                            <!-- QUESTION NO. 24 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q24" id="q24_a" value="a">
                                    <label class="form-check-label" for="q24_a">
                                        <li class="mx-4 fw-bold">&ensp; True, why take chances?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q24" id="q24_b" value="b">
                                    <label class="form-check-label" for="q24_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q24" id="q24_c" value="c">
                                    <label class="form-check-label" for="q24_c">
                                        <li class="mx-4 fw-bold">&ensp; False, I&apos;d probably produce a better output</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 25 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I FEEL GOOD WHEN I&apos;M WITH PEOPLE.</p>

                            <!-- QUESTION NO. 25 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q25" id="q25_a" value="a">
                                    <label class="form-check-label" for="q25_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q25" id="q25_b" value="b">
                                    <label class="form-check-label" for="q25_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q25" id="q25_c" value="c">
                                    <label class="form-check-label" for="q25_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 26 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I BELIEVE THAT:</p>

                            <!-- QUESTION NO. 26 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q26" id="q26_a" value="a">
                                    <label class="form-check-label" for="q26_a">
                                        <li class="mx-4 fw-bold">&ensp; Some tasks just don&apos;t have to be done as thoroughly as others</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q26" id="q26_b" value="b">
                                    <label class="form-check-label" for="q26_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q26" id="q26_c" value="c">
                                    <label class="form-check-label" for="q26_c">
                                        <li class="mx-4 fw-bold">&ensp; Anything should be done well if you do it at all</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 27 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LIKE TO PLAN ALONE WITHOUT THE INTERRUPTION OF OTHERS.</p>

                            <!-- QUESTION NO. 27 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q27" id="q27_a" value="a">
                                    <label class="form-check-label" for="q27_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q27" id="q27_b" value="b">
                                    <label class="form-check-label" for="q27_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q27" id="q27_c" value="c">
                                    <label class="form-check-label" for="q27_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 28 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IT&apos;S DIFFICULT TO BE QUIET WHEN PEOPLE CRITICIZE ME.</p>

                            <!-- QUESTION NO. 28 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q28" id="q28_a" value="a">
                                    <label class="form-check-label" for="q28_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q28" id="q28_b" value="b">
                                    <label class="form-check-label" for="q28_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q28" id="q28_c" value="c">
                                    <label class="form-check-label" for="q28_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 29 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM QUITE OKAY EVEN WHEN CONFRONTED WITH A DISORGANIZED SITUATION.</p>

                            <!-- QUESTION NO. 29 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q29" id="q29_a" value="a">
                                    <label class="form-check-label" for="q29_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q29" id="q29_b" value="b">
                                    <label class="form-check-label" for="q29_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q29" id="q29_c" value="c">
                                    <label class="form-check-label" for="q29_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 30 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;CHANGING MY PLANS BECAUSE OF OTHER PEOPLE,</p>

                            <!-- QUESTION NO. 30 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q30" id="q30_a" value="a">
                                    <label class="form-check-label" for="q30_a">
                                        <li class="mx-4 fw-bold">&ensp; Is irritating</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q30" id="q30_b" value="b">
                                    <label class="form-check-label" for="q30_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q30" id="q30_c" value="c">
                                    <label class="form-check-label" for="q30_c">
                                        <li class="mx-4 fw-bold">&ensp; Is alright</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 31 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I WOULD RATHER BE:</p>

                            <!-- QUESTION NO. 31 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q31" id="q31_a" value="a">
                                    <label class="form-check-label" for="q31_a">
                                        <li class="mx-4 fw-bold">&ensp; An event organizer, meeting people</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q31" id="q31_b" value="b">
                                    <label class="form-check-label" for="q31_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q31" id="q31_c" value="c">
                                    <label class="form-check-label" for="q31_c">
                                        <li class="mx-4 fw-bold">&ensp; An agriculturist, tending my farm</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 32 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN PROBLEMS KEEP ON COMING ONE AFTER ANOTHER, I:</p>

                            <!-- QUESTION NO. 32 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q32" id="q32_a" value="a">
                                    <label class="form-check-label" for="q32_a">
                                        <li class="mx-4 fw-bold">&ensp; Feel overwhelmed</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q32" id="q32_b" value="b">
                                    <label class="form-check-label" for="q32_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q32" id="q32_c" value="c">
                                    <label class="form-check-label" for="q32_c">
                                        <li class="mx-4 fw-bold">&ensp; Just go on and live one day at a time</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 33 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM HAPPY TAKING CARE OF OTHER PEOPLE&apos;S NEEDS.</p>

                            <!-- QUESTION NO. 33 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q33" id="q33_a" value="a">
                                    <label class="form-check-label" for="q33_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q33" id="q33_b" value="b">
                                    <label class="form-check-label" for="q33_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q33" id="q33_c" value="c">
                                    <label class="form-check-label" for="q33_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 34 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;SOMETIMES I MAKE FUNNY COMMENTS TO SURPRISE PEOPLE.</p>

                            <!-- QUESTION NO. 34 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q34" id="q34_a" value="a">
                                    <label class="form-check-label" for="q34_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q34" id="q34_b" value="b">
                                    <label class="form-check-label" for="q34_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q34" id="q34_c" value="c">
                                    <label class="form-check-label" for="q34_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 35 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN THE TIME COMES FOR SOMETHING I&apos;VE PLANNED, I OCCASIONALLY DO NOT FEEL LIKE PURSUING IT.</p>

                            <!-- QUESTION NO. 35 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q35" id="q35_a" value="a">
                                    <label class="form-check-label" for="q35_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q35" id="q35_b" value="b">
                                    <label class="form-check-label" for="q35_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q35" id="q35_c" value="c">
                                    <label class="form-check-label" for="q35_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 36 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN I LEAD, I FEEL COMFORTABLE TELLING PEOPLE WHAT TO DO.</p>

                            <!-- QUESTION NO. 36 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q36" id="q36_a" value="a">
                                    <label class="form-check-label" for="q36_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q36" id="q36_b" value="b">
                                    <label class="form-check-label" for="q36_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q36" id="q36_c" value="c">
                                    <label class="form-check-label" for="q36_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 37 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I&apos;D PREFER TO SPEND THE NIGHT:</p>

                            <!-- QUESTION NO. 37 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q37" id="q37_a" value="a">
                                    <label class="form-check-label" for="q37_a">
                                        <li class="mx-4 fw-bold">&ensp; Watching a movie alone at home</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q37" id="q37_b" value="b">
                                    <label class="form-check-label" for="q37_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q37" id="q37_c" value="c">
                                    <label class="form-check-label" for="q37_c">
                                        <li class="mx-4 fw-bold">&ensp; At a lively party with my friends</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 38 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM MORE OF:</p>

                            <!-- QUESTION NO. 38 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q38" id="q38_a" value="a">
                                    <label class="form-check-label" for="q38_a">
                                        <li class="mx-4 fw-bold">&ensp; Collaborative</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q38" id="q38_b" value="b">
                                    <label class="form-check-label" for="q38_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q38" id="q38_c" value="c">
                                    <label class="form-check-label" for="q38_c">
                                        <li class="mx-4 fw-bold">&ensp; Authoritative</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 39 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;EMBARRASSING BUT I TEND TO LIKE DISCRIMINATIVE, RACIST & SLAPSTICK HUMOR OF SOME SHOWS.</p>

                            <!-- QUESTION NO. 39 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q39" id="q39_a" value="a">
                                    <label class="form-check-label" for="q39_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q39" id="q39_b" value="b">
                                    <label class="form-check-label" for="q39_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q39" id="q39_c" value="c">
                                    <label class="form-check-label" for="q39_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 40 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;RESPECT FOR WHAT IS RIGHT IS MORE IMPORTANT THAN TO BE RICH.</p>

                            <!-- QUESTION NO. 40 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q40" id="q40_a" value="a">
                                    <label class="form-check-label" for="q40_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q40" id="q40_b" value="b">
                                    <label class="form-check-label" for="q40_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q40" id="q40_c" value="c">
                                    <label class="form-check-label" for="q40_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 41 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM TIMID & HESITANT IN MAKING NEW FRIENDS.</p>

                            <!-- QUESTION NO. 41 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q41" id="q41_a" value="a">
                                    <label class="form-check-label" for="q41_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q41" id="q41_b" value="b">
                                    <label class="form-check-label" for="q41_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q41" id="q41_c" value="c">
                                    <label class="form-check-label" for="q41_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 42 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IF I COULD, I PREFER:</p>

                            <!-- QUESTION NO. 42 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q42" id="q42_a" value="a">
                                    <label class="form-check-label" for="q42_a">
                                        <li class="mx-4 fw-bold">&ensp; Aerobics</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q42" id="q42_b" value="b">
                                    <label class="form-check-label" for="q42_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q42" id="q42_c" value="c">
                                    <label class="form-check-label" for="q42_c">
                                        <li class="mx-4 fw-bold">&ensp; Basketball</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 43 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IT IS WISE TO KNOW THE REASON BEHIND AN ACTION.</p>

                            <!-- QUESTION NO. 43 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q43" id="q43_a" value="a">
                                    <label class="form-check-label" for="q43_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q43" id="q43_b" value="b">
                                    <label class="form-check-label" for="q43_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q43" id="q43_c" value="c">
                                    <label class="form-check-label" for="q43_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 44 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;TO BE AN ACTOR/ACTRESS IS MORE INTERESTING THAN TO BE A PILOT.</p>

                            <!-- QUESTION NO. 44 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q44" id="q44_a" value="a">
                                    <label class="form-check-label" for="q44_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q44" id="q44_b" value="b">
                                    <label class="form-check-label" for="q44_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q44" id="q44_c" value="c">
                                    <label class="form-check-label" for="q44_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 45 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;PEOPLE JUDGE ME TOO QUICKLY.</p>

                            <!-- QUESTION NO. 45 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q45" id="q45_a" value="a">
                                    <label class="form-check-label" for="q45_a">
                                        <li class="mx-4 fw-bold">&ensp; Rarely</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q45" id="q45_b" value="b">
                                    <label class="form-check-label" for="q45_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q45" id="q45_c" value="c">
                                    <label class="form-check-label" for="q45_c">
                                        <li class="mx-4 fw-bold">&ensp; Often</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 46 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM A PERSON WHO:</p>

                            <!-- QUESTION NO. 46 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q46" id="q46_a" value="a">
                                    <label class="form-check-label" for="q46_a">
                                        <li class="mx-4 fw-bold">&ensp; works on tasks</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q46" id="q46_b" value="b">
                                    <label class="form-check-label" for="q46_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q46" id="q46_c" value="c">
                                    <label class="form-check-label" for="q46_c">
                                        <li class="mx-4 fw-bold">&ensp; daydreams</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 47 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;SOME PEOPLE THINK IT&apos;S DIFFICULT TO MAKE FRIENDS WITH ME.</p>

                            <!-- QUESTION NO. 47 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q47" id="q47_a" value="a">
                                    <label class="form-check-label" for="q47_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q47" id="q47_b" value="b">
                                    <label class="form-check-label" for="q47_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q47" id="q47_c" value="c">
                                    <label class="form-check-label" for="q47_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 48 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I MAY MISLEAD PEOPLE BY BEING WARM TO THEM WHEN I REALLY DON&apos;T LIKE THEM.</p>

                            <!-- QUESTION NO. 48 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q48" id="q48_a" value="a">
                                    <label class="form-check-label" for="q48_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q48" id="q48_b" value="b">
                                    <label class="form-check-label" for="q48_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q48" id="q48_c" value="c">
                                    <label class="form-check-label" for="q48_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 49 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM PRACTICAL & REALISTIC.</p>

                            <!-- QUESTION NO. 49 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q49" id="q49_a" value="a">
                                    <label class="form-check-label" for="q49_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q49" id="q49_b" value="b">
                                    <label class="form-check-label" for="q49_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q49" id="q49_c" value="c">
                                    <label class="form-check-label" for="q49_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 50 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AVOID TO BE INTIMATE WITH OTHER PEOPLE & KEEP MY PROBLEMS TO MYSELF.</p>

                            <!-- QUESTION NO. 51 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q50" id="q50_a" value="a">
                                    <label class="form-check-label" for="q50_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q50" id="q50_b" value="b">
                                    <label class="form-check-label" for="q50_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q50" id="q50_c" value="c">
                                    <label class="form-check-label" for="q50_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 51 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;EVEN IF I ALREADY MADE A DECISION, I CAN&apos;T HELP BUT KEEP ON THINKING WHETHER IT WAS GOOD OR BAD.</p>

                            <!-- QUESTION NO. 51 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q51" id="q51_a" value="a">
                                    <label class="form-check-label" for="q51_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q51" id="q51_b" value="b">
                                    <label class="form-check-label" for="q51_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q51" id="q51_c" value="c">
                                    <label class="form-check-label" for="q51_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 52 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I DISLIKE PEOPLE WHO SEEM TO DEVIATE FROM WHAT IS USUAL OR SEEM DIFFERENT FROM MOST PEOPLE.</p>

                            <!-- QUESTION NO. 52 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q52" id="q52_a" value="a">
                                    <label class="form-check-label" for="q52_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q52" id="q52_b" value="b">
                                    <label class="form-check-label" for="q52_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q52" id="q52_c" value="c">
                                    <label class="form-check-label" for="q52_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 53 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I PREFER TO:</p>

                            <!-- QUESTION NO. 53 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q53" id="q53_a" value="a">
                                    <label class="form-check-label" for="q53_a">
                                        <li class="mx-4 fw-bold">&ensp; Reflect more about my life</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q53" id="q53_b" value="b">
                                    <label class="form-check-label" for="q53_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q53" id="q53_c" value="c">
                                    <label class="form-check-label" for="q53_c">
                                        <li class="mx-4 fw-bold">&ensp; Get a good paying job</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 54 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN PEOPLE MISUNDERSTAND EACH OTHER, IT BOTHERS ME SO MUCH.</p>

                            <!-- QUESTION NO. 54 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q54" id="q54_a" value="a">
                                    <label class="form-check-label" for="q54_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q54" id="q54_b" value="b">
                                    <label class="form-check-label" for="q54_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q54" id="q54_c" value="c">
                                    <label class="form-check-label" for="q54_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 55 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;A COMMUNITY NEEDS:</p>

                            <!-- QUESTION NO. 55 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q55" id="q55_a" value="a">
                                    <label class="form-check-label" for="q55_a">
                                        <li class="mx-4 fw-bold">&ensp; Grounded, action oriented citizens</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q55" id="q55_b" value="b">
                                    <label class="form-check-label" for="q55_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q55" id="q55_c" value="c">
                                    <label class="form-check-label" for="q55_c">
                                        <li class="mx-4 fw-bold">&ensp; Idealistic citizens with ideas to improve the community</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 56 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I PREFER ACTIVITIES:</p>

                            <!-- QUESTION NO. 56 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q56" id="q56_a" value="a">
                                    <label class="form-check-label" for="q56_a">
                                        <li class="mx-4 fw-bold">&ensp; In a team or with a partner</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q56" id="q56_b" value="b">
                                    <label class="form-check-label" for="q56_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q56" id="q56_c" value="c">
                                    <label class="form-check-label" for="q56_c">
                                        <li class="mx-4 fw-bold">&ensp; Done alone</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 57 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I RELY ON CHANCE RATHER THAN PLAN OUT THINGS CAREFULLY.</p>

                            <!-- QUESTION NO. 57 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q57" id="q57_a" value="a">
                                    <label class="form-check-label" for="q57_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q57" id="q57_b" value="b">
                                    <label class="form-check-label" for="q57_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q57" id="q57_c" value="c">
                                    <label class="form-check-label" for="q57_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 58 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;THERE ARE TIMES THAT I EXPERIENCE SELF-PITY WITHOUT KNOWING WHY.</p>

                            <!-- QUESTION NO. 58 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q58" id="q58_a" value="a">
                                    <label class="form-check-label" for="q58_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q58" id="q58_b" value="b">
                                    <label class="form-check-label" for="q58_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q58" id="q58_c" value="c">
                                    <label class="form-check-label" for="q58_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 59 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I&apos;M MORE PRODUCTIVE WHEN ALONE.</p>

                            <!-- QUESTION NO. 59 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q59" id="q59_a" value="a">
                                    <label class="form-check-label" for="q59_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q59" id="q59_b" value="b">
                                    <label class="form-check-label" for="q59_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q59" id="q59_c" value="c">
                                    <label class="form-check-label" for="q59_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 60 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IT&apos;S ALRIGHT EVEN IF PEOPLE DISTURB ME WHEN I&apos;M TRYING TO DO SOMETHING.</p>

                            <!-- QUESTION NO. 60 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q60" id="q60_a" value="a">
                                    <label class="form-check-label" for="q60_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q60" id="q60_b" value="b">
                                    <label class="form-check-label" for="q60_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q60" id="q60_c" value="c">
                                    <label class="form-check-label" for="q60_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 61 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LIKE MY THINGS TO BE ALWAYS NEAT & CLEAN.</p>

                            <!-- QUESTION NO. 61 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q61" id="q61_a" value="a">
                                    <label class="form-check-label" for="q61_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q61" id="q61_b" value="b">
                                    <label class="form-check-label" for="q61_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q61" id="q61_c" value="c">
                                    <label class="form-check-label" for="q61_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 62 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I GET DISAPPOINTED WITH PEOPLE TOO EASILY.</p>

                            <!-- QUESTION NO. 62 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q62" id="q62_a" value="a">
                                    <label class="form-check-label" for="q62_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q62" id="q62_b" value="b">
                                    <label class="form-check-label" for="q62_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q62" id="q62_c" value="c">
                                    <label class="form-check-label" for="q62_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 63 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IT IS DIFFICULT FOR ME TO SHOW THAT I CARE FOR SOMEONE.</p>

                            <!-- QUESTION NO. 63 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q63" id="q63_a" value="a">
                                    <label class="form-check-label" for="q63_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q63" id="q63_b" value="b">
                                    <label class="form-check-label" for="q63_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q63" id="q63_c" value="c">
                                    <label class="form-check-label" for="q63_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 64 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I GET WHAT I DREAM TO ACHIEVE MOST OF THE TIME.</p>

                            <!-- QUESTION NO. 64 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q64" id="q64_a" value="a">
                                    <label class="form-check-label" for="q64_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q64" id="q64_b" value="b">
                                    <label class="form-check-label" for="q64_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q64" id="q64_c" value="c">
                                    <label class="form-check-label" for="q64_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 65 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;GIVEN THE SAME SALARY, I PREFER TO BE A WRITER THAN A SALESMAN.</p>

                            <!-- QUESTION NO. 65 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q65" id="q65_a" value="a">
                                    <label class="form-check-label" for="q65_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q65" id="q65_b" value="b">
                                    <label class="form-check-label" for="q65_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q65" id="q65_c" value="c">
                                    <label class="form-check-label" for="q65_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 66 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN PEOPLE DO BAD THINGS, I OPENLY TELL THEM WHAT I BELIEVE IS RIGHT.</p>

                            <!-- QUESTION NO. 66 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q66" id="q66_a" value="a">
                                    <label class="form-check-label" for="q66_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q66" id="q66_b" value="b">
                                    <label class="form-check-label" for="q66_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q66" id="q66_c" value="c">
                                    <label class="form-check-label" for="q66_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 67 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;MY AFFECT/EMOTIONAL NEEDS SUCH AS THE NEED TO BE LOVED OR RESPECTED, ARE NOT FULFILLED:</p>

                            <!-- QUESTION NO. 67 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q67" id="q67_a" value="a">
                                    <label class="form-check-label" for="q67_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q67" id="q67_b" value="b">
                                    <label class="form-check-label" for="q67_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q67" id="q67_c" value="c">
                                    <label class="form-check-label" for="q67_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 68 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM ENTHUSIASTIC DOING A LOT OF PROJECTS & ACTIVITIES.</p>

                            <!-- QUESTION NO. 68 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q68" id="q68_a" value="a">
                                    <label class="form-check-label" for="q68_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q68" id="q68_b" value="b">
                                    <label class="form-check-label" for="q68_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q68" id="q68_c" value="c">
                                    <label class="form-check-label" for="q68_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 69 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;MORAL STANDARDS OF THE SOCIETY SHOULD BE STRICTLY OBSERVED.</p>

                            <!-- QUESTION NO. 70 -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q69" id="q69_a" value="a">
                                    <label class="form-check-label" for="q69_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q69" id="q69_b" value="b">
                                    <label class="form-check-label" for="q69_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q69" id="q69_c" value="c">
                                    <label class="form-check-label" for="q69_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 70 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I PREFER TO BE LOW PROFILE RATHER THAN CATCH OTHER PEOPLES&apos; ATTENTION.</p>

                            <!-- QUESTION NO. 70 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q70" id="q70_a" value="a">
                                    <label class="form-check-label" for="q70_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q70" id="q70_b" value="b">
                                    <label class="form-check-label" for="q70_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q70" id="q70_c" value="c">
                                    <label class="form-check-label" for="q70_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 71 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM NOT COMFORTABLE WHEN EVERYONE LOOKS AT ME.</p>

                            <!-- QUESTION NO. 71 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q71" id="q71_a" value="a">
                                    <label class="form-check-label" for="q71_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q71" id="q71_b" value="b">
                                    <label class="form-check-label" for="q71_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q71" id="q71_c" value="c">
                                    <label class="form-check-label" for="q71_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 72 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN ASKED TO OBSERVE ALL THE DETAILS IN A SIMPLE RULE, I GET IRRITATED.</p>

                            <!-- QUESTION NO. 72 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q72" id="q72_a" value="a">
                                    <label class="form-check-label" for="q72_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q72" id="q72_b" value="b">
                                    <label class="form-check-label" for="q72_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q72" id="q72_c" value="c">
                                    <label class="form-check-label" for="q72_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 73 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;INITIATING A TALK TO STRANGERS:</p>

                            <!-- QUESTION NO. 73 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q73" id="q73_a" value="a">
                                    <label class="form-check-label" for="q73_a">
                                        <li class="mx-4 fw-bold">&ensp; Is easy</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q73" id="q73_b" value="b">
                                    <label class="form-check-label" for="q73_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q73" id="q73_c" value="c">
                                    <label class="form-check-label" for="q73_c">
                                        <li class="mx-4 fw-bold">&ensp; Is difficult for me</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 74 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IF I&apos;M A WRITER, I&apos;D PREFER:</p>

                            <!-- QUESTION NO. 74 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q74" id="q74_a" value="a">
                                    <label class="form-check-label" for="q74_a">
                                        <li class="mx-4 fw-bold">&ensp; Movie reviews</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q74" id="q74_b" value="b">
                                    <label class="form-check-label" for="q74_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q74" id="q74_c" value="c">
                                    <label class="form-check-label" for="q74_c">
                                        <li class="mx-4 fw-bold">&ensp; Sports reviews</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 75 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;EVEN SMALL THINGS CAN CAUSE GREAT DISTRESS ON ME.</p>

                            <!-- QUESTION NO. 75 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q75" id="q75_a" value="a">
                                    <label class="form-check-label" for="q75_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q75" id="q75_b" value="b">
                                    <label class="form-check-label" for="q75_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q75" id="q75_c" value="c">
                                    <label class="form-check-label" for="q75_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 76 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I DON&apos;T TRUST PEOPLE WHO FLATTER OTHER PEOPLE BECAUSE THEIR MOTIVES MAY NOT BE RIGHT.</p>

                            <!-- QUESTION NO. 76 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q76" id="q76_a" value="a">
                                    <label class="form-check-label" for="q76_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q76" id="q76_b" value="b">
                                    <label class="form-check-label" for="q76_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q76" id="q76_c" value="c">
                                    <label class="form-check-label" for="q76_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 77 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;AN ARTIST PAINTING SOMETHING IS A JOY TO WATCH THAN A BUILDING BEING BUILT.</p>

                            <!-- QUESTION NO. 77 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q77" id="q77_a" value="a">
                                    <label class="form-check-label" for="q77_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q77" id="q77_b" value="b">
                                    <label class="form-check-label" for="q77_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q77" id="q77_c" value="c">
                                    <label class="form-check-label" for="q77_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 78 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;PEOPLE WITHOUT SUPERVISION MAY NOT DO THEIR WORK IF THEY BELIEVE THEY CANNOT BE CAUGHT.</p>

                            <!-- QUESTION NO. 78 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q78" id="q78_a" value="a">
                                    <label class="form-check-label" for="q78_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q78" id="q78_b" value="b">
                                    <label class="form-check-label" for="q78_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q78" id="q78_c" value="c">
                                    <label class="form-check-label" for="q78_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 79 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I HAVE GREAT IDEAS ABOUT SO MANY THINGS IT IS DIFFICULT TO APPLY ALL OF THEM.</p>

                            <!-- QUESTION NO. 79 CHOICE -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q79" id="q79_a" value="a">
                                    <label class="form-check-label" for="q79_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q79" id="q79_b" value="b">
                                    <label class="form-check-label" for="q79_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q79" id="q79_c" value="c">
                                    <label class="form-check-label" for="q79_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 80 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN HAVING A CONVERSATION WITH A NEW ACQUAINTANCE, I ONLY REVEAL FACTS THAT ARE IMPORTANT.</p>

                            <!-- QUESTION NO. 80 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q80" id="q80_a" value="a">
                                    <label class="form-check-label" for="q80_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q80" id="q80_b" value="b">
                                    <label class="form-check-label" for="q80_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q80" id="q80_c" value="c">
                                    <label class="form-check-label" for="q80_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 81 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I FOCUS MORE ON:</p>

                            <!-- QUESTION NO. 81 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q81" id="q81_a" value="a">
                                    <label class="form-check-label" for="q81_a">
                                        <li class="mx-4 fw-bold">&ensp; What I see & observe around me</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q81" id="q81_b" value="b">
                                    <label class="form-check-label" for="q81_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q81" id="q81_c" value="c">
                                    <label class="form-check-label" for="q81_c">
                                        <li class="mx-4 fw-bold">&ensp; My fantasies & wishes</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 82 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN I AM CRITICIZED IN FRONT OF OTHER PEOPLE, I FEEL DEGRADED, HURT & INSULTED.</p>

                            <!-- QUESTION NO. 82 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q82" id="q82_a" value="a">
                                    <label class="form-check-label" for="q82_a">
                                        <li class="mx-4 fw-bold">&ensp; hardly ever</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q82" id="q82_b" value="b">
                                    <label class="form-check-label" for="q82_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q82" id="q82_c" value="c">
                                    <label class="form-check-label" for="q82_c">
                                        <li class="mx-4 fw-bold">&ensp; often</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 83 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;PEOPLE ARE MORE FASCINATING IF THEIR PLANS & DESIGNS VARY FROM THE MAJORITY.</p>

                            <!-- QUESTION NO. 83 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q83" id="q83_a" value="a">
                                    <label class="form-check-label" for="q83_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q83" id="q83_b" value="b">
                                    <label class="form-check-label" for="q83_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q83" id="q83_c" value="c">
                                    <label class="form-check-label" for="q83_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 84 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN INTERACTING WITH PEOPLE, I PREFER TO:</p>

                            <!-- QUESTION NO. 84 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q84" id="q84_a" value="a">
                                    <label class="form-check-label" for="q84_a">
                                        <li class="mx-4 fw-bold">&ensp; Be open & frank about everything</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q84" id="q84_b" value="b">
                                    <label class="form-check-label" for="q84_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q84" id="q84_c" value="c">
                                    <label class="form-check-label" for="q84_c">
                                        <li class="mx-4 fw-bold">&ensp; Keep confidential issues to yourself</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 85 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;SOMETIMES, RATHER THAN PARDON SOMEONE FOR HIS OFFENSE & MOVE ON, I WOULD LIKE TO TAKE REVENGE IN MY HANDS.</p>

                            <!-- QUESTION NO. 85 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q85" id="q85_a" value="a">
                                    <label class="form-check-label" for="q85_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q85" id="q85_b" value="b">
                                    <label class="form-check-label" for="q85_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q85" id="q85_c" value="c">
                                    <label class="form-check-label" for="q85_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 86 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;PEOPLE WHO ARE TRADITIONAL ARE BETTER THAN THOSE WHO SERIOUSLY RE EXAMINE THEIR PHILOSOPHY OR OUTLOOK ABOUT LIFE.</p>

                            <!-- QUESTION NO. 86 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q86" id="q86_a" value="a">
                                    <label class="form-check-label" for="q86_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q86" id="q86_b" value="b">
                                    <label class="form-check-label" for="q86_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q86" id="q86_c" value="c">
                                    <label class="form-check-label" for="q86_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 87 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I&apos;M THE ONE IN CHARGE OF THINGS THAT ARE GOING ON IN MY LIFE.</p>

                            <!-- QUESTION NO. 87 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q87" id="q87_a" value="a">
                                    <label class="form-check-label" for="q87_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q87" id="q87_b" value="b">
                                    <label class="form-check-label" for="q87_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q87" id="q87_c" value="c">
                                    <label class="form-check-label" for="q87_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 88 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;ROUTINE & FAMILIAR WORK ARE:</p>

                            <!-- QUESTION NO. 88 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q88" id="q88_a" value="a">
                                    <label class="form-check-label" for="q88_a">
                                        <li class="mx-4 fw-bold">&ensp; Monotonous/unchallenging</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q88" id="q88_b" value="b">
                                    <label class="form-check-label" for="q88_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q88" id="q88_c" value="c">
                                    <label class="form-check-label" for="q88_c">
                                        <li class="mx-4 fw-bold">&ensp; Giving me a sense of security</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 89 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I PREFER WORKING ALONE RATHER THAN WORKING WITH A GROUP.</p>

                            <!-- QUESTION NO. 89 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q89" id="q89_a" value="a">
                                    <label class="form-check-label" for="q89_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q89" id="q89_b" value="b">
                                    <label class="form-check-label" for="q89_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q89" id="q89_c" value="c">
                                    <label class="form-check-label" for="q89_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 90 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I CAN WORK EVEN IF MY WORKPLACE IS A LITTLE BIT CLUTTERED.</p>

                            <!-- QUESTION NO. 90 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q90" id="q90_a" value="a">
                                    <label class="form-check-label" for="q90_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q90" id="q90_b" value="b">
                                    <label class="form-check-label" for="q90_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q90" id="q90_c" value="c">
                                    <label class="form-check-label" for="q90_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 91 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I CAN BE TOLERANT OF OTHERS WHO FIND IT HARD TO GRASP WHAT I AM TRYING TO SAY.</p>

                            <!-- QUESTION NO. 91 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q91" id="q91_a" value="a">
                                    <label class="form-check-label" for="q91_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q91" id="q91_b" value="b">
                                    <label class="form-check-label" for="q91_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q91" id="q91_c" value="c">
                                    <label class="form-check-label" for="q91_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 92 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;DOING A GROUP ACTIVITY IS SOMETHING THAT I LOVE TO DO.</p>

                            <!-- QUESITON NO. 92 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q92" id="q92_a" value="a">
                                    <label class="form-check-label" for="q92_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q92" id="q92_b" value="b">
                                    <label class="form-check-label" for="q92_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q92" id="q92_c" value="c">
                                    <label class="form-check-label" for="q92_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 93 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LIKE TO DO THINGS THE WAY THEY SHOULD BE DONE.</p>

                            <!-- QUESTION NO. 93 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q93" id="q93_a" value="a">
                                    <label class="form-check-label" for="q93_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q93" id="q93_b" value="b">
                                    <label class="form-check-label" for="q93_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q93" id="q93_c" value="c">
                                    <label class="form-check-label" for="q93_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 94 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN I HAVE TO STAND IN A LONG LINE TO WAIT FOR MY TURN, I CALMLY ACCEPT THAT AS PART OF LIVING IN THIS SOCIETY.</p>

                            <!-- QUESTION NO. 94 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q94" id="q94_a" value="a">
                                    <label class="form-check-label" for="q94_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q94" id="q94_b" value="b">
                                    <label class="form-check-label" for="q94_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q94" id="q94_c" value="c">
                                    <label class="form-check-label" for="q94_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 95 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;PEOPLE CAN BE HARSH &TREAT ME LESS REASONABLY THAN WHAT I THINK I AM WORTH OF.</p>

                            <!-- QUESTION NO. 95 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q95" id="q95_a" value="a">
                                    <label class="form-check-label" for="q95_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q95" id="q95_b" value="b">
                                    <label class="form-check-label" for="q95_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q95" id="q95_c" value="c">
                                    <label class="form-check-label" for="q95_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 96 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LOVE PEOPLE WHO GENUINELY SHOW THEIR FEELINGS.</p>

                            <!-- QUESTION NO. 96 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q96" id="q96_a" value="a">
                                    <label class="form-check-label" for="q96_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q96" id="q96_b" value="b">
                                    <label class="form-check-label" for="q96_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q96" id="q96_c" value="c">
                                    <label class="form-check-label" for="q96_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 97 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I DON&apos;T ALLOW MYSELF TO BE SAD OVER SMALL THINGS.</p>

                            <!-- QUESTION 97 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q97" id="q97_a" value="a">
                                    <label class="form-check-label" for="q97_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q97" id="q97_b" value="b">
                                    <label class="form-check-label" for="q97_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q97" id="q97_c" value="c">
                                    <label class="form-check-label" for="q97_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 98 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IF GIVEN A CHANCE TO HELP DEVELOP A USEFUL VACCINE, I&apos;D PREFER:</p>

                            <!-- QUESTION NO. 98 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q98" id="q98_a" value="a">
                                    <label class="form-check-label" for="q98_a">
                                        <li class="mx-4 fw-bold">&ensp; Working in a laboratory</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q98" id="q98_b" value="b">
                                    <label class="form-check-label" for="q98_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q98" id="q98_c" value="c">
                                    <label class="form-check-label" for="q98_c">
                                        <li class="mx-4 fw-bold">&ensp; Conducting experimental trials with people</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 99 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IF BEING KIND DOES NOT WORK, I CAN BE A DISCIPLINARIAN IF NECESSARY.</p>

                            <!-- QUESTION NO. 99 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q99" id="q99_a" value="a">
                                    <label class="form-check-label" for="q99_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q99" id="q99_b" value="b">
                                    <label class="form-check-label" for="q99_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q99" id="q99_c" value="c">
                                    <label class="form-check-label" for="q99_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 100 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I ENJOY GOING OUT TO SHOWS/ENTERTAINMENT OFTEN.</p>

                            <!-- QUESTION NO. 100 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q100" id="q100_a" value="a">
                                    <label class="form-check-label" for="q100_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q100" id="q100_b" value="b">
                                    <label class="form-check-label" for="q100_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q100" id="q100_c" value="c">
                                    <label class="form-check-label" for="q100_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 101 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM NOT CONTENTED WITH MYSELF.</p>

                            <!-- QUESTION NO. 101 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q101" id="q101_a" value="a">
                                    <label class="form-check-label" for="q101_a">
                                        <li class="mx-4 fw-bold">&ensp; Sometimes</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q101" id="q101_b" value="b">
                                    <label class="form-check-label" for="q101_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q101" id="q101_c" value="c">
                                    <label class="form-check-label" for="q101_c">
                                        <li class="mx-4 fw-bold">&ensp; Rarely</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 102 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IF WE WERE LOST IN A NATURE PARK & MY COMPANIONS DID NOT AGREE WITH ME ON THE RIGHT WAY TO GO, I:</p>

                            <!-- QUESTION NO. 102 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q102" id="q102_a" value="a">
                                    <label class="form-check-label" for="q102_a">
                                        <li class="mx-4 fw-bold">&ensp; Wouldn&apos;t mind & just follow them</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q102" id="q102_b" value="b">
                                    <label class="form-check-label" for="q102_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q102" id="q102_c" value="c">
                                    <label class="form-check-label" for="q102_c">
                                        <li class="mx-4 fw-bold">&ensp; Tell them that my way was best</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 103 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;MY FRIENDS THINK I AM A JOLLY, EASY GOING PERSON.</p>

                            <!-- QUESTION NO. 103 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q103" id="q103_a" value="a">
                                    <label class="form-check-label" for="q103_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q103" id="q103_b" value="b">
                                    <label class="form-check-label" for="q103_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q103" id="q103_c" value="c">
                                    <label class="form-check-label" for="q103_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 104 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IF A CASHIER WAS CARELESS & MISTAKENLY FAILED TO CHARGE ME FOR SOMETHING,</p>

                            <!-- QUESTION NO. 104 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q104" id="q104_a" value="a">
                                    <label class="form-check-label" for="q104_a">
                                        <li class="mx-4 fw-bold">&ensp; I had to go back & pay</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q104" id="q104_b" value="b">
                                    <label class="form-check-label" for="q104_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q104" id="q104_c" value="c">
                                    <label class="form-check-label" for="q104_c">
                                        <li class="mx-4 fw-bold">&ensp; It&apos;s not my business to tell her</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 105 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I HAVE ALWAYS TO STRUGGLE AGAINST BEING TOO SHY OR INTROVERTED.</p>

                            <!-- QUESTION NO. 105 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q105" id="q105_a" value="a">
                                    <label class="form-check-label" for="q105_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q105" id="q105_b" value="b">
                                    <label class="form-check-label" for="q105_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q105" id="q105_c" value="c">
                                    <label class="form-check-label" for="q105_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 106 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;PEOPLE IN AUTHORITY DO THEIR BEST TO BLOCK US FROM EXECUTING WHAT WE LOVE TO DO.</p>

                            <!-- QUESTION NO. 106 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q106" id="q106_a" value="a">
                                    <label class="form-check-label" for="q106_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q106" id="q106_b" value="b">
                                    <label class="form-check-label" for="q106_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q106" id="q106_c" value="c">
                                    <label class="form-check-label" for="q106_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 107 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN I AM WITH OTHER PEOPLE, I CONTENT MYSELF LISTENING WHILE OTHERS DO THE TALKING.</p>

                            <!-- QUESTION NO. 107 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q107" id="q107_a" value="a">
                                    <label class="form-check-label" for="q107_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q107" id="q107_b" value="b">
                                    <label class="form-check-label" for="q107_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q107" id="q107_c" value="c">
                                    <label class="form-check-label" for="q107_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 108 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM AMAZED MORE OF THE WONDER OF POETRY COMPARED TO AN EXPERT SPORT STRATEGY.</p>

                            <!-- QUESTION NO. 108 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q108" id="q108_a" value="a">
                                    <label class="form-check-label" for="q108_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q108" id="q108_b" value="b">
                                    <label class="form-check-label" for="q108_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q108" id="q108_c" value="c">
                                    <label class="form-check-label" for="q108_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 109 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IF A PERSON IS SILENT ABOUT ANYTHING, OTHERS APPRECIATE IT.</p>

                            <!-- QUESTION NO. 109 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q109" id="q109_a" value="a">
                                    <label class="form-check-label" for="q109_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q109" id="q109_b" value="b">
                                    <label class="form-check-label" for="q109_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q109" id="q109_c" value="c">
                                    <label class="form-check-label" for="q109_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 110 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I&apos;M NATURALLY GOOD IN UNDERSTANDING HOW MACHINES WORK & HOW TO FIX THEM.</p>

                            <!-- QUESTION NO. 110 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q110" id="q110_a" value="a">
                                    <label class="form-check-label" for="q110_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q110" id="q110_b" value="b">
                                    <label class="form-check-label" for="q110_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q110" id="q110_c" value="c">
                                    <label class="form-check-label" for="q110_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 111 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;SOMETIMES, I BECOME ABSENT MINDED TO THE EXTENT THAT I FORGET THE TIME & COULD NOT RECALL WHERE I PUT SOME OF MY THINGS.</p>

                            <!-- QUESTION NO. 111 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q111" id="q111_a" value="a">
                                    <label class="form-check-label" for="q111_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q111" id="q111_b" value="b">
                                    <label class="form-check-label" for="q111_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q111" id="q111_c" value="c">
                                    <label class="form-check-label" for="q111_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 112 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;MAJORITY OF THE PEOPLE I MET ARE NOT TRUSTWORTHY.</p>

                            <!-- QUESTION NO. 112 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q112" id="q112_a" value="a">
                                    <label class="form-check-label" for="q112_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q112" id="q112_b" value="b">
                                    <label class="form-check-label" for="q112_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q112" id="q112_c" value="c">
                                    <label class="form-check-label" for="q112_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 113 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I USUALLY DISCOVER THAT I UNDERSTAND OTHER PEOPLE MORE THAN THEY UNDERSTAND ME.</p>

                            <!-- QUESTION NO. 113 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q113" id="q113_a" value="a">
                                    <label class="form-check-label" for="q113_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q113" id="q113_b" value="b">
                                    <label class="form-check-label" for="q113_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q113" id="q113_c" value="c">
                                    <label class="form-check-label" for="q113_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 114 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I PUT MY IDEAS INTO PRACTICAL APPLICATION IN MY PROJECTS.</p>

                            <!-- QUESTION NO. 114 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q114" id="q114_a" value="a">
                                    <label class="form-check-label" for="q114_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q114" id="q114_b" value="b">
                                    <label class="form-check-label" for="q114_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q114" id="q114_c" value="c">
                                    <label class="form-check-label" for="q114_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 115 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WRONGDOERS DO NOT DESERVE RESPECT.</p>

                            <!-- QUESTION NO. 115 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q115" id="q115_a" value="a">
                                    <label class="form-check-label" for="q115_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q115" id="q115_b" value="b">
                                    <label class="form-check-label" for="q115_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q115" id="q115_c" value="c">
                                    <label class="form-check-label" for="q115_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 116 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;SOMETIMES, I AM ANXIOUS OVER WHAT I THINK IS MY MISTAKE EVEN THOUGH IT MAY NOT REALLY BE MY MISTAKE AT ALL.</p>

                            <!-- QUESTION NO. 116 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q116" id="q116_a" value="a">
                                    <label class="form-check-label" for="q116_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q116" id="q116_b" value="b">
                                    <label class="form-check-label" for="q116_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q116" id="q116_c" value="c">
                                    <label class="form-check-label" for="q116_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 117 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I TALK ABOUT MY EMOTIONS:</p>

                            <!-- QUESTION NO. 117 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q117" id="q117_a" value="a">
                                    <label class="form-check-label" for="q117_a">
                                        <li class="mx-4 fw-bold">&ensp; openly</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q117" id="q117_b" value="b">
                                    <label class="form-check-label" for="q117_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q117" id="q117_c" value="c">
                                    <label class="form-check-label" for="q117_c">
                                        <li class="mx-4 fw-bold">&ensp; only if I can&apos;t anymore avoid it</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 118 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LIKE TO THINK OF WAYS TO IMPROVE MY COMMUNITY.</p>

                            <!-- QUESTION NO. 118 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q118" id="q118_a" value="a">
                                    <label class="form-check-label" for="q118_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q118" id="q118_b" value="b">
                                    <label class="form-check-label" for="q118_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q118" id="q118_c" value="c">
                                    <label class="form-check-label" for="q118_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 119 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I REMEMBER THINGS THAT I SHOULD HAVE OPENED TO OTHERS BUT FAILED TO DO SO.</p>

                            <!-- QUESTION NO. 119 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q119" id="q119_a" value="a">
                                    <label class="form-check-label" for="q119_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q119" id="q119_b" value="b">
                                    <label class="form-check-label" for="q119_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q119" id="q119_c" value="c">
                                    <label class="form-check-label" for="q119_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 120 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN LISTENING TO NEWS, I PREFER:</p>

                            <!-- QUESTION NO. 120 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q120" id="q120_a" value="a">
                                    <label class="form-check-label" for="q120_a">
                                        <li class="mx-4 fw-bold">&ensp; Problems of the people in our community</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q120" id="q120_b" value="b">
                                    <label class="form-check-label" for="q120_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q120" id="q120_c" value="c">
                                    <label class="form-check-label" for="q120_c">
                                        <li class="mx-4 fw-bold">&ensp; All the local news</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 121 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I&apos;D RATHER:</p>

                            <!-- QUESTION NO. 121 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q121" id="q121_a" value="a">
                                    <label class="form-check-label" for="q121_a">
                                        <li class="mx-4 fw-bold">&ensp; Work alone in a project</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q121" id="q121_b" value="b">
                                    <label class="form-check-label" for="q121_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q121" id="q121_c" value="c">
                                    <label class="form-check-label" for="q121_c">
                                        <li class="mx-4 fw-bold">&ensp; Work on a project with friends</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 122 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IF THERE IS SOMETHING I NEED TO DO, I TEND TO:</p>

                            <!-- QUESTION NO. 122 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q122" id="q122_a" value="a">
                                    <label class="form-check-label" for="q122_a">
                                        <li class="mx-4 fw-bold">&ensp; postpone it</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q122" id="q122_b" value="b">
                                    <label class="form-check-label" for="q122_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q122" id="q122_c" value="c">
                                    <label class="form-check-label" for="q122_c">
                                        <li class="mx-4 fw-bold">&ensp; start it right away</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 123 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I PREFER TO EXERCISE:</p>

                            <!-- QUESTION NO. 123 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q123" id="q123_a" value="a">
                                    <label class="form-check-label" for="q123_a">
                                        <li class="mx-4 fw-bold">&ensp; With people</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q123" id="q123_b" value="b">
                                    <label class="form-check-label" for="q123_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q123" id="q123_c" value="c">
                                    <label class="form-check-label" for="q123_c">
                                        <li class="mx-4 fw-bold">&ensp; Alone</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 124 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I&apos;M CALM & CONSIDERATE EVEN WHEN OTHERS ARE QUITE RUDE & SELF-CENTERED.</p>

                            <!-- QUESTION NO. 124 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q124" id="q124_a" value="a">
                                    <label class="form-check-label" for="q124_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q124" id="q124_b" value="b">
                                    <label class="form-check-label" for="q124_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q124" id="q124_c" value="c">
                                    <label class="form-check-label" for="q124_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 125 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I USUALLY FOCUS MORE ON THE PREPARATION FIRST BEFORE I START ON A PROJECT/TASK.</p>

                            <!-- QUESTION NO. 125 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q125" id="q125_a" value="a">
                                    <label class="form-check-label" for="q125_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q125" id="q125_b" value="b">
                                    <label class="form-check-label" for="q125_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q125" id="q125_c" value="c">
                                    <label class="form-check-label" for="q125_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 126 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I GET IMPATIENT WHEN PEOPLE TAKE TOO MUCH TIME TO DESCRIBE OR EXPLAIN WHAT I WANT TO UNDERSTAND.</p>

                            <!-- QUESTION NO. 126 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q126" id="q126_a" value="a">
                                    <label class="form-check-label" for="q126_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q126" id="q126_b" value="b">
                                    <label class="form-check-label" for="q126_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q126" id="q126_c" value="c">
                                    <label class="form-check-label" for="q126_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 127 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;MOST PEOPLE FIND ME:</p>

                            <!-- QUESTION NO. 127 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q127" id="q127_a" value="a">
                                    <label class="form-check-label" for="q127_a">
                                        <li class="mx-4 fw-bold">&ensp; Open and friendly</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q127" id="q127_b" value="b">
                                    <label class="form-check-label" for="q127_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q127" id="q127_c" value="c">
                                    <label class="form-check-label" for="q127_c">
                                        <li class="mx-4 fw-bold">&ensp; A little bit distant and fair</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 128 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN I SLEEP AT NIGHT, I FEEL CONTENTED WITH WHAT HAPPENED DURING THE DAY.</p>

                            <!-- QUESTION NO. 128 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q128" id="q128_a" value="a">
                                    <label class="form-check-label" for="q128_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q128" id="q128_b" value="b">
                                    <label class="form-check-label" for="q128_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q128" id="q128_c" value="c">
                                    <label class="form-check-label" for="q128_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 129 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN I HAVE EXTRA TIME TO SPEND,  I&apos;D PREFER:</p>

                            <!-- QUESTION NO. 129 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q129" id="q129_a" value="a">
                                    <label class="form-check-label" for="q129_a">
                                        <li class="mx-4 fw-bold">&ensp; Creating/doing something alone</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q129" id="q129_b" value="b">
                                    <label class="form-check-label" for="q129_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q129" id="q129_c" value="c">
                                    <label class="form-check-label" for="q129_c">
                                        <li class="mx-4 fw-bold">&ensp; Do community service with people</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 130 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN ONE RECEIVES UNSATISFACTORY SERVICE BY FOOD DELIEVERERS SUCH AS THE FOOD PANDA, ONE SHOULD COMPLAIN.</p>

                            <!-- QUESTION NO. 130 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q130" id="q130_a" value="a">
                                    <label class="form-check-label" for="q130_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q130" id="q130_b" value="b">
                                    <label class="form-check-label" for="q130_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q130" id="q130_c" value="c">
                                    <label class="form-check-label" for="q130_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 131 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;COMPARED TO MOST PEOPLE, I AM MOODY W/ LOTS OF EXTREME EMOTIONS &lpar;EX. VERY HAPPY THEN SUDDENLY SHIFTS INTO DEPRESSED MOOD  OR VICE VERSA&rpar;</p>

                            <!-- QUESTION NO. 131 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q131" id="q131_a" value="a">
                                    <label class="form-check-label" for="q131_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q131" id="q131_b" value="b">
                                    <label class="form-check-label" for="q131_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q131" id="q131_c" value="c">
                                    <label class="form-check-label" for="q131_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 132 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I CAN USUALLY CONVINCE PEOPLE WHO DO NOT SEE THINGS THE WAY I DO, TO SEE THINGS THE WAY I SEE THEM.</p>

                            <!-- QUESTION NO. 132 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q132" id="q132_a" value="a">
                                    <label class="form-check-label" for="q132_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q132" id="q132_b" value="b">
                                    <label class="form-check-label" for="q132_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q132" id="q132_c" value="c">
                                    <label class="form-check-label" for="q132_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 133 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;HAVING THE LIBERTY TO DO WHAT I WANT IS MORE VALUABLE THAN GOOD VALUES & OBEDIENCE TO THE LAW.</p>

                            <!-- QUESTION NO. 133 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q133" id="q133_a" value="a">
                                    <label class="form-check-label" for="q133_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q133" id="q133_b" value="b">
                                    <label class="form-check-label" for="q133_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q133" id="q133_c" value="c">
                                    <label class="form-check-label" for="q133_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 134 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LOVE TO SEE PEOPLE ENJOY MY FUNNY STORIES.</p>

                            <!-- QUESTION NO. 134 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q134" id="q134_a" value="a">
                                    <label class="form-check-label" for="q134_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q134" id="q134_b" value="b">
                                    <label class="form-check-label" for="q134_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q134" id="q134_c" value="c">
                                    <label class="form-check-label" for="q134_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 135 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM TRULY AN EXTROVERTED PERSON.</p>

                            <!-- QUESTION NO. 135 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q135" id="q135_a" value="a">
                                    <label class="form-check-label" for="q135_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q135" id="q135_b" value="b">
                                    <label class="form-check-label" for="q135_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q135" id="q135_c" value="c">
                                    <label class="form-check-label" for="q135_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 136 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IF A PERSON KNOWS TO EVADE THE RULES WITHOUT APPEARING TO VIOLATE THEM, HE SHOULD:</p>

                            <!-- QUESTION NO. 136 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q136" id="q136_a" value="a">
                                    <label class="form-check-label" for="q136_a">
                                        <li class="mx-4 fw-bold">&ensp; Do it only for a greater cause</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q136" id="q136_b" value="b">
                                    <label class="form-check-label" for="q136_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q136" id="q136_c" value="c">
                                    <label class="form-check-label" for="q136_c">
                                        <li class="mx-4 fw-bold">&ensp; Not do it at all</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 137 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I USUALLY TAKE THE FIRST MOVE IN INITIATING FRIENDSHIPS.</p>

                            <!-- QUESTION NO. 137 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q137" id="q137_a" value="a">
                                    <label class="form-check-label" for="q137_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q137" id="q137_b" value="b">
                                    <label class="form-check-label" for="q137_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q137" id="q137_c" value="c">
                                    <label class="form-check-label" for="q137_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 138 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;AUTHENTIC OR GENUINE ACTION STORIES ARE BETTER THAN FANTASY NOVELS.</p>

                            <!-- QUESTION NO. 138 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q138" id="q138_a" value="a">
                                    <label class="form-check-label" for="q138_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q138" id="q138_b" value="b">
                                    <label class="form-check-label" for="q138_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q138" id="q138_c" value="c">
                                    <label class="form-check-label" for="q138_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 139 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;PEOPLE WHO SEEM WARM & OPEN TO ME COULD BE BETRAYING ME SECRETLY AT MY BACK.</p>

                            <!-- QUESTION NO. 139 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q139" id="q139_a" value="a">
                                    <label class="form-check-label" for="q139_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q139" id="q139_b" value="b">
                                    <label class="form-check-label" for="q139_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q139" id="q139_c" value="c">
                                    <label class="form-check-label" for="q139_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 140 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LIKE TO DEAL WITH NUMBERS RATHER THAN DEAL WITH WORDS.</p>

                            <!-- QUESTION NO. 140 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q140" id="q140_a" value="a">
                                    <label class="form-check-label" for="q140_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q140" id="q140_b" value="b">
                                    <label class="form-check-label" for="q140_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q140" id="q140_c" value="c">
                                    <label class="form-check-label" for="q140_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 141 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;MANY TOUCHY, EASILY HURT PEOPLE SHOULD LEARN TO BE STRONG FOR THEIR OWN SAKE.</p>

                            <!-- QUESTION NO. 141 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q141" id="q141_a" value="a">
                                    <label class="form-check-label" for="q141_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q141" id="q141_b" value="b">
                                    <label class="form-check-label" for="q141_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q141" id="q141_c" value="c">
                                    <label class="form-check-label" for="q141_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 142 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I&apos;M SO CONCERNED ABOUT IDEAS THAT I TEND TO FORGET THEIR APPLICATIONS IN MY IMMEDIATE ENVIRONMENT & SOCIETY IN GENERAL.</p>

                            <!-- QUESTION NO. 142 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q142" id="q142_a" value="a">
                                    <label class="form-check-label" for="q142_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q142" id="q142_b" value="b">
                                    <label class="form-check-label" for="q142_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q142" id="q142_c" value="c">
                                    <label class="form-check-label" for="q142_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 143 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I KEEP MYSELF AWAY FROM RESPONDING TO VERY INTIMATE, PERSONAL QUESTIONS.</p>

                            <!-- QUESTION NO. 143 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q143" id="q143_a" value="a">
                                    <label class="form-check-label" for="q143_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q143" id="q143_b" value="b">
                                    <label class="form-check-label" for="q143_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q143" id="q143_c" value="c">
                                    <label class="form-check-label" for="q143_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 144 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I&apos;M TOO BUSY TO HELP WITHOUT PAY.</p>

                            <!-- QUESTION NO. 144 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q144" id="q144_a" value="a">
                                    <label class="form-check-label" for="q144_a">
                                        <li class="mx-4 fw-bold">&ensp; Sometimes</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q144" id="q144_b" value="b">
                                    <label class="form-check-label" for="q144_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q144" id="q144_c" value="c">
                                    <label class="form-check-label" for="q144_c">
                                        <li class="mx-4 fw-bold">&ensp; Rarely</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 145 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;SOMETIMES, I AM OUT OF PLACE &lpar;OP&rpar; IN A GROUP BECAUSE MY IDEAS ARE TOO DIFFERENT FROM THEIRS.</p>

                            <!-- QUESTION NO. 145 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q145" id="q145_a" value="a">
                                    <label class="form-check-label" for="q145_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q145" id="q145_b" value="b">
                                    <label class="form-check-label" for="q145_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q145" id="q145_c" value="c">
                                    <label class="form-check-label" for="q145_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 146 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;COMPARED TO MOST PEOPLE, I AM CALM AND DON&apos;T PANIC EASILY.</p>

                            <!-- QUESTION NO. 146 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q146" id="q146_a" value="a">
                                    <label class="form-check-label" for="q146_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q146" id="q146_b" value="b">
                                    <label class="form-check-label" for="q146_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q146" id="q146_c" value="c">
                                    <label class="form-check-label" for="q146_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 147 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;MORE PROBLEMS WILL COME UP WHEN:</p>

                            <!-- QUESTION NO. 147 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q147" id="q147_a" value="a">
                                    <label class="form-check-label" for="q147_a">
                                        <li class="mx-4 fw-bold">&ensp; People question & change tried & tested strategies</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q147" id="q147_b" value="b">
                                    <label class="form-check-label" for="q147_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q147" id="q147_c" value="c">
                                    <label class="form-check-label" for="q147_c">
                                        <li class="mx-4 fw-bold">&ensp; People turn down innovative strategies or methods</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 148 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM VERY SELECTIVE WITH THE PERSON I WILL OPEN UP OR TELL MY PROBLEM.</p>

                            <!-- QUESTION NO. 148 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q148" id="q148_a" value="a">
                                    <label class="form-check-label" for="q148_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q148" id="q148_b" value="b">
                                    <label class="form-check-label" for="q148_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q148" id="q148_c" value="c">
                                    <label class="form-check-label" for="q148_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 149 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN I AM NOT LIKE OR NOT SIMILAR WITH THE OTHER PERSON IN TERMS OF BELIEFS/VIEWS, I:</p>

                            <!-- QUESTION NO. 149 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q149" id="q149_a" value="a">
                                    <label class="form-check-label" for="q149_a">
                                        <li class="mx-4 fw-bold">&ensp; Talk about our dissimilarities</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q149" id="q149_b" value="b">
                                    <label class="form-check-label" for="q149_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q149" id="q149_c" value="c">
                                    <label class="form-check-label" for="q149_c">
                                        <li class="mx-4 fw-bold">&ensp; Talk about something else</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 150 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I HAVE THE TENDENCY TO FIND FAULT WITH MYSELF EASILY.</p>

                            <!-- QUESTION NO. 150 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q150" id="q150_a" value="a">
                                    <label class="form-check-label" for="q150_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q150" id="q150_b" value="b">
                                    <label class="form-check-label" for="q150_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q150" id="q150_c" value="c">
                                    <label class="form-check-label" for="q150_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 151 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I&apos;D RATHER SPEND MY VACATION IN FAMILIAR PLACES RATHER THAN DO SOME VACATION ADVENTURES IN UNFAMILIAR PLACES.</p>

                            <!-- QUESTION NO. 151 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q151" id="q151_a" value="a">
                                    <label class="form-check-label" for="q151_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q151" id="q151_b" value="b">
                                    <label class="form-check-label" for="q151_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q151" id="q151_c" value="c">
                                    <label class="form-check-label" for="q151_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 152 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I CAN SPEND THE DAY WITHOUT SEEKING FOR SOMEONE TO CHAT WITH.</p>

                            <!-- QUESTION NO. 152 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q152" id="q152_a" value="a">
                                    <label class="form-check-label" for="q152_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q152" id="q152_b" value="b">
                                    <label class="form-check-label" for="q152_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q152" id="q152_c" value="c">
                                    <label class="form-check-label" for="q152_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 153 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I TEND TO USE PEOPLE TO GET WHAT I WANT.</p>

                            <!-- QUESTION NO. 153 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q153" id="q153_a" value="a">
                                    <label class="form-check-label" for="q153_a">
                                        <li class="mx-4 fw-bold">&ensp; Sometimes</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q153" id="q153_b" value="b">
                                    <label class="form-check-label" for="q153_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q153" id="q153_c" value="c">
                                    <label class="form-check-label" for="q153_c">
                                        <li class="mx-4 fw-bold">&ensp; Never</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 154 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LIKE SCHEDULING EVERYTHING SO NO TIME WILL BE WASTED.</p>

                            <!-- QUESTION NO. 154 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q154" id="q154_a" value="a">
                                    <label class="form-check-label" for="q154_a">
                                        <li class="mx-4 fw-bold">&ensp; Rarely</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q154" id="q154_b" value="b">
                                    <label class="form-check-label" for="q154_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q154" id="q154_c" value="c">
                                    <label class="form-check-label" for="q154_c">
                                        <li class="mx-4 fw-bold">&ensp; Often</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 155 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN I AM PRESSURED, EVEN LITTLE THINGS ANNOY ME.</p>

                            <!-- QUESTION NO. 155 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q155" id="q155_a" value="a">
                                    <label class="form-check-label" for="q155_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q155" id="q155_b" value="b">
                                    <label class="form-check-label" for="q155_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q155" id="q155_c" value="c">
                                    <label class="form-check-label" for="q155_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 156 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN DOING SOMETHING, I PREFER:</p>

                            <!-- QUESTION NO. 156 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q156" id="q156_a" value="a">
                                    <label class="form-check-label" for="q156_a">
                                        <li class="mx-4 fw-bold">&ensp; Working with other people</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q156" id="q156_b" value="b">
                                    <label class="form-check-label" for="q156_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q156" id="q156_c" value="c">
                                    <label class="form-check-label" for="q156_c">
                                        <li class="mx-4 fw-bold">&ensp; Working alone</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 157 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN WORKING ON A TASK, I&apos;M NOT CONTENTED UNLESS I PUT ALL MY ATTENTION INTO IT.</p>

                            <!-- QUESTION NO. 157 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q157" id="q157_a" value="a">
                                    <label class="form-check-label" for="q157_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q157" id="q157_b" value="b">
                                    <label class="form-check-label" for="q157_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q157" id="q157_c" value="c">
                                    <label class="form-check-label" for="q157_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 158 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I HAVE LEARNED TO BE CONSIDERATE WITH ALL TYPES OF PEOPLE.</p>

                            <!-- QUESTION NO. 158 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q158" id="q158_a" value="a">
                                    <label class="form-check-label" for="q158_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q158" id="q158_b" value="b">
                                    <label class="form-check-label" for="q158_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q158" id="q158_c" value="c">
                                    <label class="form-check-label" for="q158_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 159 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I WOULD RATHER LISTEN TO PEOPLE DISCUSS THEIR PERSONAL ISSUES THAN ABOUT OTHER MATTERS.</p>

                            <!-- QUESTION NO. 159 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q159" id="q159_a" value="a">
                                    <label class="form-check-label" for="q159_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q159" id="q159_b" value="b">
                                    <label class="form-check-label" for="q159_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q159" id="q159_c" value="c">
                                    <label class="form-check-label" for="q159_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 160 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;THERE ARE MOMENTS THAT I AM NOT FEELING GOOD TO SEE ANYONE.</p>

                            <!-- QUESTION NO. 160 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q160" id="q160_a" value="a">
                                    <label class="form-check-label" for="q160_a">
                                        <li class="mx-4 fw-bold">&ensp; Very rarely</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q160" id="q160_b" value="b">
                                    <label class="form-check-label" for="q160_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q160" id="q160_c" value="c">
                                    <label class="form-check-label" for="q160_c">
                                        <li class="mx-4 fw-bold">&ensp; Quite often</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 161 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I WOULD ENJOY WORK IF I:</p>

                            <!-- QUESTION NO. 161 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q161" id="q161_a" value="a">
                                    <label class="form-check-label" for="q161_a">
                                        <li class="mx-4 fw-bold">&ensp; Handle machines / do the encoding</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q161" id="q161_b" value="b">
                                    <label class="form-check-label" for="q161_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q161" id="q161_c" value="c">
                                    <label class="form-check-label" for="q161_c">
                                        <li class="mx-4 fw-bold">&ensp; See people & interview applicants</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 162 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;IN MY DAILY ACTIVITIES, IT IS SELDOM THAT I MEET A PROBLEM THAT I CANNOT SOLVE.</p>

                            <!-- QUESTION NO. 162 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q162" id="q162_a" value="a">
                                    <label class="form-check-label" for="q162_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q162" id="q162_b" value="b">
                                    <label class="form-check-label" for="q162_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q162" id="q162_c" value="c">
                                    <label class="form-check-label" for="q162_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 163 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHEN I&apos;M SURE THAT A PERSON IS NOT RIGHT, I:</p>

                            <!-- QUESTION NO. 163 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q163" id="q163_a" value="a">
                                    <label class="form-check-label" for="q163_a">
                                        <li class="mx-4 fw-bold">&ensp; Will make it known to him</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q163" id="q163_b" value="b">
                                    <label class="form-check-label" for="q163_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q163" id="q163_c" value="c">
                                    <label class="form-check-label" for="q163_c">
                                        <li class="mx-4 fw-bold">&ensp; Will let it pass</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 164 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I LOVE ASKING FRIENDS TO COME OVER & ENTERTAIN THEM</p>

                            <!-- QUESTION NO. 164 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q164" id="q164_a" value="a">
                                    <label class="form-check-label" for="q164_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q164" id="q164_b" value="b">
                                    <label class="form-check-label" for="q164_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q164" id="q164_c" value="c">
                                    <label class="form-check-label" for="q164_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 165 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I APPRECIATE FRIENDLY RIVALRY WITH OTHER PEOPLE IN ACTIVITIES THAT I ENGAGE MYSELF WITH.</p>

                            <!-- QUESTION NO. 165 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q165" id="q165_a" value="a">
                                    <label class="form-check-label" for="q165_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q165" id="q165_b" value="b">
                                    <label class="form-check-label" for="q165_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q165" id="q165_c" value="c">
                                    <label class="form-check-label" for="q165_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 166 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;LAWS MAY BE VIOLATED WHEN THERE ARE VALID JUSTIFICATIONS TO VIOLATE THEM.</p>

                            <!-- QUESTION NO. 166 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q166" id="q166_a" value="a">
                                    <label class="form-check-label" for="q166_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q166" id="q166_b" value="b">
                                    <label class="form-check-label" for="q166_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q166" id="q166_c" value="c">
                                    <label class="form-check-label" for="q166_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 167 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;PUBLIC SPEAKING IS DIFFICULT FOR ME.</p>

                            <!-- QUESTION NO. 167 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q167" id="q167_a" value="a">
                                    <label class="form-check-label" for="q167_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q167" id="q167_b" value="b">
                                    <label class="form-check-label" for="q167_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q167" id="q167_c" value="c">
                                    <label class="form-check-label" for="q167_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 168 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;WHENEVER I AGREE OR DISAGREE ON SOMETHING, I ALWAYS THINK WHAT IS JUST & FAIR.</p>

                            <!-- QUESTION NO. 168 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q168" id="q168_a" value="a">
                                    <label class="form-check-label" for="q168_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q168" id="q168_b" value="b">
                                    <label class="form-check-label" for="q168_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q168" id="q168_c" value="c">
                                    <label class="form-check-label" for="q168_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 169 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;I AM TIMID & NOT CONFIDENT ABOUT MYSELF WHEN I AM WITH A BIG GROUP.</p>

                                <!-- QUESTION NO. 169 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q169" id="q169_a" value="a">
                                    <label class="form-check-label" for="q169_a">
                                        <li class="mx-4 fw-bold">&ensp; True</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q169" id="q169_b" value="b">
                                    <label class="form-check-label" for="q169_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q169" id="q169_c" value="c">
                                    <label class="form-check-label" for="q169_c">
                                        <li class="mx-4 fw-bold">&ensp; False</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>

                    <!-- QUESTION NO. 170 -->
                    <fieldset>
                        <li class="mt-4">
                            <p>&emsp;ON YOUTUBE, I LIKE TO WATCH:</p>

                            <!-- QUESTION NO. 170 CHOICES -->
                            <ol style="padding-left: 20px;" type="a">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q170" id="q170_a" value="a">
                                    <label class="form-check-label" for="q170_a">
                                        <li class="mx-4 fw-bold">&ensp; Shows on pioneering, useful inventions</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q170" id="q170_b" value="b">
                                    <label class="form-check-label" for="q170_b">
                                        <li class="mx-4 fw-bold">&ensp; ?</li>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q170" id="q170_c" value="c">
                                    <label class="form-check-label" for="q170_c">
                                        <li class="mx-4 fw-bold">&ensp; Music concert representing my age group or generation</li>
                                    </label>
                                </div>
                            </ol>
                        </li>
                    </fieldset>
                </ol>
            </fieldset>
        </div>
        <!-- <hr class="mx-4 my-5" style="border-style: dashed; border-width: 1px;"> -->

        <!-- SUBMIT BUTTON -->
        <div class="row mx-4 mb-5 text-center">
            <div class="justify-content-center align-items-center">
                <button id="submit-test-btn" class="btn btn-lg fs-4" type="submit" value="Submit">SUBMIT</button>
            </div>
        </div>
    </form>
@endsection

@section('test-result')
    <div id="result" class="row mx-4 my-5 justify-content-start align-items-center">
        <h3>YOUR RESULT:</h3>

        <!-- STRENGTHS -->
        <ul id="strengthsList" class="row mx-4 my-5 justify-content-start align-items-center">
            <h4>STRENGTHS:</h4>
        </ul>

        <!-- WEAKNESSES -->
        <ul id="weaknessesList" class="row mx-4 my-5 justify-content-start align-items-center">
            <h4>WEAKNESSES:</h4>
        </ul>

        <!-- GO BACK TO THE USER DASHBOARD -->
        <div class="row mx-4 mb-5 text-center">
            <div class="input-group justify-content-center align-items-center">
                <a href="{{ route('dashboard') }}" class="btn btn-lg fs-4" type="button">DONE</a>
            </div>
        </div>
    </div>
@endsection
