/*
*   GOD'S GIFT ASSESSMENT PROCESS
*/
document.getElementById('godsGiftTest').addEventListener('submit', function(event) {
    // Prevent default form submission behavior
    event.preventDefault();

    // Hide the form
    document.getElementById('godsGiftTest').style.display = 'none';

    /*
    *   COLLECTING ANSWERS FROM THE FORM
    */
    let testAnswers = [];

    // Iterate through each form element
    let radioButtons = document.querySelectorAll('input[type="radio"]');
    console.log(radioButtons);

    radioButtons.forEach(radioButton => {
        // console.log(radioButton.name);
        // console.log(radioButton.value);
        // console.log(radioButton.checked);

        let question = radioButton.name;
        let answer = radioButton.value;

        // Add the value of the checked radio button to the answers array
        if(radioButton.checked){
            testAnswers.push({ name: question, value: answer });
        }
    });
    console.log(testAnswers);

    var userSex = document.getElementById('user-info').getAttribute('data-sex');

    console.log(userSex);

    let result = calculateResults(testAnswers, userSex);
    console.log(result);

    // Destructure the results into separate variables
    let { strengths, weaknesses } = result;

    /*
    * PRINTING RESULTS
    */
    printResults(strengths, weaknesses);

    // Show the result element
    document.getElementById('result').style.display = 'block';

    // Send the results to the backend using Fetch API
    fetch('/test-page', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(result) // Ensure 'result' is an object with the correct data
    })
    .then(() => {
        // Optionally handle success without waiting for JSON response
        console.log('Assessment data saved successfully');
        // For example, update UI to show success message or redirect
        // window.location.href = '/success'; // Redirect after successful save
    })
    .catch(error => {
        console.error('Error:', error);
        // Optionally handle error, display error message, etc.
    });
});

/*
*   CALCULATE THE RESULTS HERE
*/
function calculateResults(testAnswers, userSex){

    //PRONOUNS
    let subj = "";
    let obj1 = "";
    let obj2 = "";
    let self = "";
    if (userSex==='Female'){
        subj = "SHE";
        obj1 = "HER";
        obj2 = "HER";
        self = "HERSELF";
    }
    else if (userSex==='Male'){
        subj = "HE";
        obj1 = "HIS";
        obj2 = "HIM";
        self = "HIMSELF";
    }
    else
    {
        console.log(`userSex is ${userSex}`);
    }

    //FACTOR DICTIONARY
    const factors = {
        "q1": {
            "A": "A",
            "?": "A"
        },
        "q2": {
            "A": "C",
            "?": "C"
        },
        "q3": {
            "C": "E",
            "?": "E"
        },
        "q4": {
            "C" : "F",
            "?": "F"
        },
        "q5": {
            "A" : "G",
            "?": "G"
        },
        "q6": {
            "A" : "F",
            "?": "F"
        },
        "q7": {
            "A" : "G",
            "?": "G"
        },
        "q8": {
            "A" : "H",
            "?": "H",
            "C" : "I",
            "?": "I"
        },
        "q10": {
            "A" : "I",
            "?": "I"
        },
        "q11": {
            "A" : "L",
            "?": "L"
        },
        "q12": {
            "A" : "M",
            "?": "M"
        },
        "q13": {
            "A" : "L",
            "?": "L"
        },
        "q14": {
            "A" : "M",
            "?": "M"
        },
        "q15": {
            "C" : "N",
            "?": "N"
        },
        "q17": {
            "C" : "M",
            "?": "M"
        },
        "q18": {
            "C" : "N",
            "?": "N"
        },
        "q19": {
            "C" : "O",
            "?": "O"
        },
        "q20": {
            "C" : "Q1",
            "?": "Q1"
        },
        "q21": {
            "C" : "O",
            "?": "O"
        },
        "q22": {
            "A" : "Q1",
            "?": "Q1"
        },
        "q24": {
            "C" : "Q1",
            "?": "Q1"
        },
        "q25": {
            "C" : "Q2",
            "?": "Q2"
        },
        "q26": {
            "C" : "Q3",
            "?": "Q3"
        },
        "q27": {
            "A" : "Q2",
            "?": "Q2"
        },
        "q28": {
            "A" : "Q4",
            "?": "Q4"
        },
        "q29": {
            "C" : "Q3",
            "?": "Q3"
        },
        "q30": {
            "A" : "Q4",
            "?": "Q4"
        },
        "q31": {
            "A" : "A",
            "?": "A"
        },
        "q32": {
            "C" : "C",
            "?": "C"
        },
        "q33": {
            "A" : "A",
            "?": "A"
        },
        "q35": {
            "C" : "C",
            "?": "C"
        },
        "q36": {
            "A" : "E",
            "?": "E"
        },
        "q37": {
            "C" : "F",
            "?": "F"
        },
        "q38": {
            "C" : "E",
            "?": "E"
        },
        "q39": {
            "A" : "F",
            "?": "F"
        },
        "q40": {
            "A" : "G",
            "?": "G"
        },
        "q41": {
            "C" : "H",
            "?": "H"
        },
        "q42": {
            "A" : "I",
            "?": "I"
        },
        "q43": {
            "A" : "L",
            "?": "L"
        },
        "q44": {
            "A" : "I",
            "?": "I"
        },
        "q45": {
            "C" : "L",
            "?": "L"
        },
        "q46": {
            "C" : "M",
            "?": "M"
        },
        "q47": {
            "A" : "N",
            "?": "N"
        },
        "q49": {
            "C" : "M",
            "?": "M"
        },
        "q50": {
            "A" : "N",
            "?": "N"
        },
        "q51": {
            "A" : "O",
            "?": "O"
        },
        "q52": {
            "C" : "Q1",
            "?": "Q1"
        },
        "q53": {
            "A" : "Q1",
            "?": "Q1"
        },
        "q54": {
            "A" : "O",
            "?": "O"
        },
        "q55": {
            "C" : "Q1",
            "?": "Q1"
        },
        "q56": {
            "C" : "Q2",
            "?": "Q2"
        },
        "q57": {
            "C" : "Q3",
            "?": "Q3"
        },
        "q59": {
            "A" : "Q2",
            "?": "Q2"
        },
        "q60": {
            "C" : "Q4",
            "?": "Q4"
        },
        "q61": {
            "A" : "Q3",
            "?": "Q3"
        },
        "q62": {
            "A" : "Q4",
            "?": "Q4"
        },
        "q63": {
            "C" : "A",
            "?": "A"
        },
        "q64": {
            "A" : "C",
            "?": "C"
        },
        "q65": {
            "C" : "A",
            "?": "A"
        },
        "q66": {
            "A" : "E",
            "?": "E"
        },
        "q67": {
            "C" : "C",
            "?": "C"
        },
        "q68": {
            "A" : "F",
            "?": "F"
        },
        "q69": {
            "A" : "G",
            "?": "G"
        },
        "q70": {
            "C" : "F",
            "?": "F"
        },
        "q71": {
            "C" : "H",
            "?": "H"
        },
        "q72": {
            "C" : "G",
            "?": "G"
        },
        "q73": {
            "A" : "H",
            "?": "H"
        },
        "q74": {
            "A" : "I",
            "?": "I"
        },
        "q76": {
            "A" : "L",
            "?": "L"
        },
        "q77": {
            "A" : "I",
            "?": "I"
        },
        "q78": {
            "A" : "L",
            "?": "L"
        },
        "q79": {
            "A" : "M",
            "?": "M"
        },
        "q80": {
            "A" : "N",
            "?": "N"
        },
        "q81": {
            "C" : "M",
            "?": "M"
        },
        "q82": {
            "C" : "O",
            "?": "O"
        },
        "q83": {
            "A" : "Q1",
            "?": "Q1"
        },
        "q84": {
            "C" : "N",
            "?": "N"
        },
        "q86": {
            "C" : "Q1",
            "?": "Q1"
        },
        "q87": {
            "A" : "O",
            "?": "O"
        },
        "q88": {
            "A" : "Q1",
            "?": "Q1"
        },
        "q89": {
            "A" : "Q2",
            "?": "Q2"
        },
        "q90": {
            "C" : "Q3",
            "?": "Q3"
        },
        "q91": {
            "C" : "Q4",
            "?": "Q4"
        },
        "q92": {
            "C" : "Q2",
            "?": "Q2"
        },
        "q93": {
            "A" : "Q3",
            "?": "Q3"
        },
        "q94": {
            "C" : "Q4",
            "?": "Q4"
        },
        "q96": {
            "A" : "A",
            "?": "A"
        },
        "q97": {
            "A" : "C",
            "?": "C"
        },
        "q98": {
            "C" : "A",
            "?": "A"
        },
        "q99": {
            "A" : "E",
            "?": "E"
        },
        "q100": {
            "A" : "F",
            "?": "F"
        },
        "q102": {
            "C" : "E",
            "?": "E"
        },
        "q103": {
            "A" : "F",
            "?": "F"
        },
        "q104": {
            "A" : "G",
            "?": "G"
        },
        "q105": {
            "C" : "H",
            "?": "H"
        },
        "q106": {
            "C" : "G",
            "?": "G"
        },
        "q107": {
            "C" : "H",
            "?": "H"
        },
        "q108": {
            "A" : "I",
            "?": "I"
        },
        "q109": {
            "C" : "L",
            "?": "L"
        },
        "q110": {
            "C" : "I",
            "?": "I"
        },
        "q111": {
            "A" : "M",
            "?": "M"
        },
        "q112": {
            "A" : "L",
            "?": "L"
        },
        "q113": {
            "A" : "N",
            "?": "N"
        },
        "q114": {
            "C" : "M",
            "?": "M"
        },
        "q116": {
            "A" : "O",
            "?": "O"
        },
        "q117": {
            "C" : "N",
            "?": "N"
        },
        "q118": {
            "A" : "Q1",
            "?": "Q1"
        },
        "q119": {
            "A" : "O",
            "?": "O"
        },
        "q120": {
            "A" : "Q1",
            "?": "Q1"
        },
        "q121": {
            "A" : "Q2",
            "?": "Q2"
        },
        "q122": {
            "C" : "Q3",
            "?": "Q3"
        },
        "q123": {
            "C" : "Q2",
            "?": "Q2"
        },
        "q124": {
            "C" : "Q4",
            "?": "Q4"
        },
        "q125": {
            "A" : "Q3",
            "?": "Q3"
        },
        "q126": {
            "A" : "Q4",
            "?": "Q4"
        },
        "q127": {
            "A" : "A",
            "?": "A"
        },
        "q128": {
            "A" : "C",
            "?": "C"
        },
        "q129": {
            "C" : "A",
            "?": "A"
        },
        "q130": {
            "A" : "E",
            "?": "E"
        },
        "q131": {
            "C" : "C",
            "?": "C"
        },
        "q132": {
            "A" : "E",
            "?": "E"
        },
        "q133": {
            "C" : "G",
            "?": "G"
        },
        "q134": {
            "A" : "F",
            "?": "F"
        },
        "q135": {
            "A" : "H",
            "?": "H"
        },
        "q136": {
            "C" : "G",
            "?": "G"
        },
        "q137": {
            "A" : "H",
            "?": "H"
        },
        "q138": {
            "C" : "I",
            "?": "I"
        },
        "q139": {
            "A" : "L",
            "?": "L"
        },
        "q140": {
            "C" : "I",
            "?": "I"
        },
        "q141": {
            "A" : "L",
            "?": "L"
        },
        "q142": {
            "A" : "M",
            "?": "M"
        },
        "q143": {
            "A" : "N",
            "?": "N"
        },
        "q145": {
            "A" : "M",
            "?": "M"
        },
        "q146": {
            "C" : "O",
            "?": "O"
        },
        "q147": {
            "C" : "Q1",
            "?": "Q1"
        },
        "q148": {
            "A" : "N",
            "?": "N"
        },
        "q149": {
            "A" : "Q1",
            "?": "Q1"
        },
        "q150": {
            "A" : "O",
            "?": "O"
        },
        "q151": {
            "C" : "Q1",
            "?": "Q1"
        },
        "q152": {
            "A" : "Q2",
            "?": "Q2"
        },
        "q154": {
            "C" : "Q3",
            "?": "Q3"
        },
        "q155": {
            "A" : "Q4",
            "?": "Q4"
        },
        "q156": {
            "C" : "Q2",
            "?": "Q2"
        },
        "q157": {
            "A" : "Q3",
            "?": "Q3"
        },
        "q158": {
            "C" : "Q4",
            "?": "Q4"
        },
        "q159": {
            "A" : "A",
            "?": "A"
        },
        "q160": {
            "A" : "C",
            "?": "C"
        },
        "q161": {
            "C" : "A",
            "?": "A"
        },
        "q162": {
            "A" : "C",
            "?": "C"
        },
        "q163": {
            "A" : "E",
            "?": "E",
            "C": "H",
            "?": "H"
        },
        "q164": {
            "A" : "F",
            "?": "F"
        },
        "q165": {
            "A" : "E",
            "?": "E"
        },
        "q166": {
            "C" : "G",
            "?": "G"
        },
        "q167": {
            "C" : "H",
            "?": "H"
        },
        "q168": {
            "A" : "G",
            "?": "G"
        },
        "q170": {
            "C" : "I",
            "?": "I"
        },
    };

    //FACTOR SCORING COUNTER
    let factorA = 0;
    let factorC = 0;
    let factorE = 0;
    let factorF = 0;
    let factorG = 0;
    let factorH = 0;
    let factorI = 0;
    let factorL = 0;
    let factorM = 0;
    let factorN = 0;
    let factorO = 0;
    let factorQ1 = 0;
    let factorQ2 = 0;
    let factorQ3 = 0;
    let factorQ4 = 0;

    // INTERPRETATIONS
    const interpretations = {
        "A" : {
            "+": {
                0: "GOOD-NATURED, EASY TO GET ALONG WITH & EMOTIONALLY EXPRESSIVE, CLIENT IS FRIENDLY & APPROACHABLE.",
                1: `EXTROVERT, AFFECTIONATE, AND EXPRESSIVE OF ${obj1} FEELINGS, CLIENT IS FRIENDLY & APPROACHABLE.`,
                2: `EASY TO GET ALONG WITH, WELCOMING, AND AFFECTIONATE, CLIENT IS OPEN TO MEETING NEW PEOPLE & IS EXPRESSIVE OF HOW ${subj} FEELS.`,
                3: "WILLING TO COOPERATE & ATTENTIVE TO PEOPLE’S NEEDS, CLIENT LIKES OCCUPATIONS DEALING WITH PEOPLE IN GROUP MEETINGS OR SOCIAL GATHERINGS.",
                4: "READY TO COLLABORATE AND LISTEN TO OTHER PEOPLE, CLIENT PREFERS WORK THAT INVOLVES INTERACTION WITH OTHER PEOPLE, ESPECIALLY IN SITUATIONS THAT CAN BE OF HELP TO OTHER PEOPLE IN THE COMMUNITY.",
                5: `WILLING TO COLLABORATE AND LISTEN TO OTHER PEOPLE, CLIENT PREFERS WORKING WITH PEOPLE IN PROJECTS THAT ${subj} FINDS MEANINGFUL &/OR USEFUL TO THE GROUP OR COMMUNITY AS A WHOLE.`,
                6: "FLEXIBLE, SOFT-HEARTED & KIND, CLIENT IS GENEROUS IN PERSONAL RELATIONS, IS LESS AFRAID OF CRITICISMS, AND IS BETTER ABLE TO REMEMBER NAMES OF PEOPLE."
            },
            "-": {
                0: `RESERVED AND CAUTIOUS, CLIENT APPEARS DOUBTFUL & ALOOF. ${subj} LIKES TO WORK ALONE AND IF POSSIBLE, AVOIDS COMPROMISES OF VIEWPOINTS.`,
                1: "CAUTIOUS, GUARDED AND DISTANT, CLIENT  PREFERS TO WORK ALONE AND, WHENEVER POSSIBLE, AVOIDS CHANGES OF VIEWPOINTS.",
                2: "CAUTIOUS AND DETACHED, CLIENT TENDS TO PREFER WORKING ALONE AND IGNORING VIEWPOINT CHANGES AS MUCH AS POSSIBLE.",
                3: `GUARDED, COOL & DETACHED, CLIENT IS PRECISE AND “RIGID” IN ${obj1} WAY OF DOING THINGS AND THIS APPLIES EVEN TO ${obj1} PERSONAL LIFE.`,
                4: `COLD AND DISTANT, CLIENT’S MANNER OF DOING THINGS IS EXACT AND “STRICT,” INCLUDING ${obj1} PERSONAL BUSINESS.`,
                5: `INTROVERT & SOMEWHAT A PERFECTIONIST, CLIENT’S METHOD OF DOING THINGS, INCLUDING ${obj1} OWN LIFE, IS INFLEXIBLE & \"STRINGENT.\"`,
                6: `RESTRICTIVE & RIGID, CLIENT PREFERS TO WORK ON THINGS OR DEVICES THAN ON INDIVIDUALS. THIS DOESN'T MEAN THOUGH THAT ${subj} CAN NOT WORK WITH OTHERS. PREFERENCE IS THE MAIN FACTOR.`
            }
        },
        "C" : {
            "+": {
                0: "RESILIENT & EMOTIONALLY STABLE, CLIENT IS BETTER ABLE TO MAINTAIN SOLID GROUP MORALE.",
                1: "EMOTIONALLY STRONG & SECURE, CLIENT IS CAPABLE TO SUSTAIN A STRONG SPIRIT & POSITIVE MORALE OF A GROUP.",
                2: `EMOTIONALLY CAPABLE & STRONG, CLIENT IS RESILIENT & CAN BE RELIED UPON TO MAINTAIN THE POSITIVE SPIRIT OF ${obj1} GROUP.`,
                3: "RESILIENT & SECURE, CLIENT CAN FACE REALITY WITH A SENSE OF CALMNESS AND MATURITY."
            },
            "-": {
                0: "EASILY AFFECTED BY FEELINGS, CLIENT TENDS TO AVOID IMPORTANT REALITY DEMANDS AND EASILY GETS EMOTIONAL AND ANNOYED.",
                1: "QUICKLY INFLUENCED BY THOUGHTS AND EMOTIONS, CLIENT TENDS TO GET EMOTIONAL, ANNOYED AND EVASIVE FROM NECESSARY REALITY DEMANDS.",
                2: `EASILY AFFECTED BY WHAT ${subj} FEELS, CLIENT HAS LOW FRUSTRATION TOLERANCE. THUS, ${subj} MAY FIND IT DIFFICULT TO CARRY ON WITH ${obj1} LIFE & RESPONSIBILITIES WHEN PROBLEMS COME ALONG THE WAY.`,
                3: `EMOTIONALLY LESS RESILIENT, CLIENT IS EASILY GETS INFLUENCED BY ${obj1} FEELINGS. ${subj} MAY FIND IT DIFFICULT TO ACCEPT THE FRUSTRATIONS THAT ${subj} MAY ENCOUNTER IN REAL LIFE SITUATIONS.`,
                4: `EMOTIONALLY LESS SECURE, CLIENT IS EASILY INFLUENCED BY ${obj1} FEELINGS. THUS, ${subj} MAY FIND IT HARD TO ACCEPT THE FRUSTRATION THAT USUALLY GOES WITH THE PROBLEMS ${subj} EXPERIENCES IN REAL LIFE SITUATIONS.`,
                5: "LACKING STRENGTH DUE TO EMOTIONAL INSTABILITY, CLIENT IS EASILY SHAKEN BY FRUSTRATIONS THAT COME ALONG WITH THE CHALLENGES IN REAL LIFE SITUATIONS.",
                6: `CLIENT TENDS TO BE LOW IN FRUSTRATION TOLERANCE FOR UNSATISFACTORY CONDITIONS AND IS QUITE CHANGEABLE. ${subj} GETS FRUSTRATED WHEN THINGS DO NOT COME OUT THE WAY ${subj} WANTS THEM TO BE.`,
                7: `CLIENT TENDS TO BE LACKING TOLERANCE OF FRUSTRATION FOR DISSAPPOINTING SITUATIONS ${subj} MAY ENCOUNTER IN REAL LIFE SITUATIONS. ${subj} GETS EASILY FRUSTRATED WHEN THINGS DO NOT TURN OUT TO BE THE WAY ${subj} WANTS THEM TO BE.`
            }
        },
        "E" : {
            "+": {
                0: `FREE SPIRITED & LIBERATED, CLIENT TENDS TO FOLLOW ${obj1} OWN BELIEFS, EVEN IF THIS MAY NOT BE CONSISTENT WITH THE BELIEF SYTEM FOLLOWED BY THE MAJORITY.`,
                1: `UNCONVENTIONAL & SELF-SUFFICIENT, CLIENT TENDS TO LISTEN TO ${obj1} OWN RULES RATHER THAN FOLLOW THE RULES OBSERVED BY THE SOCIETY.`,
                2: "ASSERTIVE & INDEPENDENT, CLIENT CAN BE SELF-WILLED OR STUBBORN AND MAY NOT MIND PEOPLE IN AUTHORITY.",
                3: "AUTHORITATIVE & INDIVIDUALISTIC, CLIENT CAN BE OBSTINATE & MAY DISREGARD THE RULES COMMONLY FOLLOWED BY EVERYONE.",
                4: "INSISTENT AND SELF-GOVERNING, CLIENT CAN BE INTRACTABLE AND MIGHT TAKE NO ACCOUNT OF WHAT IS BEING MANDATED BY PERSONS OF AUTHORITY."
            },
            "-": {
                0: "MEEK AND LENIENT, CLIENT IS READY TO CONFORM AND HAS THE TENDENCY TO SIMPLY YIELD TO OTHER PEOPLE’S DEMANDS.",
                1: "GENTLE AND WILLING, CLIENT IS A FOLLOWER WHO MAY QUICKLY GIVE IN TO OTHERN PEOPLE’S REQUESTS.",
                2: "COMPLIANT AND PASSIVE, CLIENT EASILY COMPLIES TO THE DEMANDS OR WISHES OF OTHERS, PARTICULARLY THOSE PEOPLE WHO OCCUPY HIGH POSITIONS OR HAVE POWER OVER OTHERS.",
                3: "HUMBLE AND MILD, CLIENT IS SUBMISSIVE AND TENDS TO GIVE WAY TO OTHERS EASILY.",
                4: "MILD AND ACCOMODATING, CLIENT IS A CONFORMIST WHO EASILY GIVES WAY TO OTHERS.",
                5: "CONFORMING AND SUBMISSIVE, IT IS NORMAL FOR THE CLIENT TO FOLLOW ORDERS OR REQUESTS FROM OTHERS, ESPECIALLY FROM SUPERIORS OR PERSONS IN AUTHORITY.",
                6: "MODEST AND GENTLE, CLIENT IS COMPLIANT AND LIKELY TO MAKE CONCESSIONS TO OTHERS QUICKLY.",
                7: "LENIENT AND COOPERATIVE, CLIENT IS AN OBEDIENT PERSON WHO YIELDS TO OTHERS WITH EASE.",
                8: "OBEDIENT AND UNASSERTIVE, IT IS COMMON FOR THE CLIENT TO OBEY OTHER PEOPLE’S COMMANDS OR WISHES, PARTICULARLY FROM SUPERIORS OR PEOPLE WHO ARE VESTED WITH AUTHORITY OVER OTHERS."
            }
        },
        "F" : {
            "+": {
                0: `CHEERFUL & LIVELY, CLIENT TENDS TO SHOW ENTHUSIASM & ACTIVE INTEREST IN ANY EVENT ${subj} MAY ENGAGE ${self} IN.`,
                1: `NATURALLY EXUDING A LIVELY PERSONALITY, CLIENT HAS THE TENDENCY TO TALK TOO MUCH AND SHOWS KEEN INTEREST IN ACTIVITIES ${subj} MAY BE INVOLVED WITH.`,
                2: "CHEERFUL, ACTIVE & TALKATIVE, CLIENT IS IMPULSIVELY LIVELY AND ENTHUSIASTIC.",
                3: "FRANK, CHEERFUL & EXPRESSIVE, CLIENT APPEARS VIVACIOUS, HIGH SPIRITED & CAREFREE.",
                4: "EASY GOING & TALKATIVE, CLIENT IS CHEERFUL YET IMPULSIVE AT THE SAME TIME."
            },
            "-": {
                0: `CAUTIOUS, WISE & SERIOUS, CLIENT IS RESTRAINED AND REFLECTIVE. ${subj} TENDS TO BE A SOBER, DEPENDABLE PERSON.`,
                1: `SELF-CONTROLLED AND REFLECTIVE, CLIENT IS PRUDENT & SERIOUS. ${subj} APPEARS TO BE CLEARHEADED AND TRUSTWORTHY.`,
                2: `SOBER AND RESTRAINED, CLIENT TENDS TO BE SERIOUS AND PRUDENT. THAT IS WHY ${subj} IS CONSIDERED ALMOST ALWAYS BEHAVING IN ACCORDANCE TO THE RULES OF ETIQUETTE.`,
                3: `CALM & STEADY, CLIENT APPEARS TO BE SINCERE & SENSIBLE. THAT IS WHY ${subj} IS CONSIDERED AS SOMEONE WHO BEHAVES IN THE CORRECT WAY: ${subj} AVOIDS BREAKING THE RULES OF ETIQUETTE.`,
                4: `STEADY & SELF-CONTROLLED, CLIENT TENDS TO BE SERIOUS AND DISCREET. MOST OBSERVERS THINK OF ${obj2} AS TRADITIONAL IN THE SENSE THAT ${subj} AVOIDS BREAKING THE RULES.`,
                5: `CONSIDERED CALM & SELF-CONTROLLED BY MOST OBSERVERS, CLIENT IS GENUINE & SINCERE. ${subj} FOLLOWS THE RULES AS MUCH AS POSSIBLE.`
            }
        },
        "G" : {
            "+": {
                0: `THE GREATEST STRENGTH HOWEVER OF THE CLIENT IS ${obj1} BEING CONSCIENTIOUS & PERSEVERING. ${subj} CAN BE DEPENDED UPON TO FINISH A TASK WITH PATIENCE AND DETERMINATION.`,
                1: `CLIENT’S TOPMOST QUALITIES ARE ${obj1} STRONG SENSE OF DUTY & ${obj1} CAPACITY TO HOLD ON. ${subj} IS RELIABLE WHEN IT COMES TO DOING & COMPLETING ${obj1} TASKS.`,
                2: `CLIENT’S TOPMOST QUALITY HOWEVER IS ${obj1} BEING PERSEVERING. DOMINATED BY A STRONG SENSE OF DUTY, CLIENT CAN BE RELIED UPON TO WORK ON A TASK UNTIL IT IS FULLY ACCOMPLISHED.`,
                3: `CLIENT’S MOST VALUABLE TRAIT HOWEVER IS ${obj1} BEING PERSEVERING. ${subj} IS RESPONSIBLE & CAN BE RELIED UPON IN TIMES OF CRISIS.`,
                4: `CLIENT’S TOPMOST CHARACTERISTICS ARE ${obj1} HIGH MORAL STANDARDS, GREAT SENSE OF RESPONSIBILITY & DETERMINATION. THEREFORE, ${subj} CAN BE RELIED TO FINISH ${obj1} COMMITMENTS EVEN DURING ADVERESITY. GENERALLY, ${subj} PREFERS INDUSTRIOUS PEOPLE THAN THOSE WHO ARE SIMPLY ENTERTAINING OR FUN TO BE WITH.`
            },
            "-": {
                0: `LACKING FORESIGHT & DETERMINATION TO ACHIEVE ${obj1} GOALS, CLIENT IS OFTEN CASUAL, LACKS PERSEVERANCE, & LACKS EFFORT TO ACHIEVE ${obj1} GOALS OR THE GROUP’S GOALS OR MEET CULTURAL DEMANDS & DEMANDS OF SOCIETY AS A WHOLE.`,
                1: "LACKING FOCUS ON GOAL ACHIEVEMENT, CLIENT SHOWS INSUFFICIENT EFFORT FOR GROUP UNDERTAKINGS & CULTURAL DEMANDS & IS GENERALLY SPONTANEOUS.",
                2: `CLIENT SHOWS EFFORT DEFICIENCY TOWARDS GOAL ACHIEVEMENT, ESPECIALLY WITH REGARD GROUP UNDERTAKINGS & CULTURAL DEMANDS. ${subj} APPEARS LACKING IN DETERMINATION & COMMITMENT TO FINISHING ${obj1} TASKS.`,
                3: `CLIENT TENDS TO BE FREE FROM GROUP INFLUENCE. HOWEVER, IF NOT GIVEN PROPER COUNSEL, THIS ATTITUDE CAN LEAD TO ANTI SOCIAL ACTS THOUGH AT TIMES, THIS MAKES ${obj2} MORE EFFECTIVE AS ${obj1} REFUSAL TO BE BOUND BY RULES CAUSES ${obj2} TO HAVE LESS SOMATIC UPSET FROM STRESS.`,
                4: `CLIENT PREFERS NOT TO BE BOUND FROM GROUP INFLUENCE. WITHOUT PROPER GUIDANCE, THIS TENDENCY MAY LEAD TO THE DEVELOPMENT OF BEHAVIORS THAT MAY DEVIATE FROM THE EXPECTATIONS OF SOCIETY. HOWEVER, ${obj1} NON COMPLIANCE WITH THE GENERAL RULES MAY TEMPORARILY RELIEVE ${obj2} FROM THE EMOTIONAL DISTRESS BROUGHT ABOUT BY PRESSURE OR EXPECTATIONS OF OTHERS.`,
                5: `CLIENT PREFERS TO BE EXEMPTED FROM GROUP INFLUENCE. THIS REFUSAL TO BE BOUND BY RULES MAY FOR THE TIME BEING, EASE ${obj2} FROM STRESS CAUSED BY GROUP OR PEER PRESSURE. RELIEF THOUGH IS TEMPORARY & MAY NOT BE WORTH FOR THE COST OF UNFULFILLED COMMITMENTS OR UNFINISHED TASKS OR DUTIES.`,
                6: "FEELING NOT REALLY ACCOUNTABLE OF WHATEVER MAY HAPPEN, CLIENT TENDS TO AVOID RULES. LACKING FOCUS AND PERSEVERANCE, CLIENT MAY NOT HAVE THE STAMINA TO FINISH WHAT IS EXPECTED OF HIM, ESPECIALLY DURING DIFFICULT AND TRYING TIMES.",
                7: `FEELING NOT REALLY ACCOUNTABLE OF WHATEVER MAY HAPPEN, CLIENT TENDS TO EVADE FROM THE RULES. LACKING FOCUS & DETERMINATION, ${subj} MAY NOT HAVE THE PERSISTENCE NEEDED TO FULFILL ${obj1} COMMITMENTS, ESPECIALLY DURING DIFFICULT & TRYING TIMES.`,
                8: `LACKING PERSEVERANCE & THE WISDOM ON THE SERIOUSNESS OF THE CONSEQUENCES OF ${obj1} BEHAVIOR, CLIENT MAY BE COMPELLED TO JUST GIVE UP & NOT FINISH WHAT IS EXPECTED FROM ${obj2}. THIS IS ESPECIALLY TRUE DURING DIFFICULT & TRYING TIMES.`
            }
        },
        "H" : {
            "+": {
                0: `ADVENTUROUS & DARING, CLIENT IS SPONTANEOUS AND READY TO TRY NEW THINGS. HOWEVER, ${subj} CAN BE TALKATIVE AND CARELESS OF SMALL THINGS THAT MATTER, ESPECIALLY IF THEY APPEAR UNIMPORTANT TO ${obj2}.`,
                1: `WILLING AND PREPARED TO TAKE ON NEW THINGS, CLIENT IS ADVENTUROUS, IMPULSIVE, AND DARING. HOWEVER, ${subj} CAN SOMETIMES BE TACTLESS OR THOUGHTLESS ON MATTERS THAT MAYBE IMPORTANT TO OTHER PEOPLE BUT NOT NECESSSARILY SIGNIFICANT FOR THE CLIENT.`,
                2: `UNRESTRAINED, CAREFREE & SPONTANEOUS, CLIENT IS CAPABLE TO FACE WEAR AND TEAR IN DEALING WITH PEOPLE & EXHAUSTING EMOTIONAL SITUATIONS, WITHOUT MUCH FATIGUE OR WEARINESS. HOWEVER, ${subj} CAN SPEND SO MUCH TIME TALKING. LIKEWISE, ${subj} MAY TAKE FOR GRANTED DANGER SIGNALS AND IMPORTANT DETAILS, ESPECIALLY IF THEY APPEAR SIMPLE AND INSIGNIFICANT TO ${obj2}.`,
                3: `GENERALLY UNRESTRICTED AND IMPULSIVE, CLIENT HAS THE CAPABILITY TO TIRELESSLY ENDURE THE EFFECTS OF DEMANDING SOCIAL AND EMOTIONAL SITUATIONS, SO MUCH SO THAT ${subj} CAN BE QUITE THE TALKER. FURTHERMORE, CLIENT TENDS TO DISREGARD SIGNS OF DANGER AND OTHER SIGNIFICANT INFORMATION, ESPECIALLY IF ${subj} PERCEIVES THEM AS SIMPLY BASIC AND UNIMPORTANT TO ${obj2}.`,
                4: `WARM HEARTED & SPONTANEOUS, CLIENT’S “THICK-SKINNEDNESS” ENABLES ${obj2} TO FACE WEAR & TEAR IN DEALING WITH PEOPLE AND GRUELING EMOTIONAL SITUATIONS, WITHOUT TIREDNESS. HOWEVER, ${subj} CAN BE LESS CAREFUL WITH DETAILS, MAY IGNORE RED FLAGS OR DANGER SIGNALS, & MAY CONSUME MUCH TIME TALKING.`,
                5: `A NATURALLY SOCIABLE, EXTROVERT & AMIABLE PERSON, CLIENT HAS THE ABILITY TO WITHSTAND HIGHLY EMOTIONAL & HIGHLY SOCIALLY DEMANDING SITUATIONS. ${subj} SEEMS INVULNERABLE TO CRITICISMS. HOWEVER, ${subj} CAN BE THOUGHTLESS OF DETAILS, MAY UNDERESTIMATE & DISMISS SIGNS OF DANGER, & HAS THE TENDENCY TO TALK TOO MUCH.`
            },
            "-": {
                0: `TYPICALLY INTROVERT & SHY, CLIENT IS RESERVED & NOT DRAWN TO THE CROWD. ${subj} MAY EXHIBIT DIFFICULTY IN SPEAKING AND EXPRESSING ${obj1} OPINIONS. LASTLY, CLIENT IS MORE COMFORTABLE BEING WITH ${obj1} PRIMARY CIRCLE OF FRIENDS RATHER THAN MAKING THE HASSLE OF MEETING STRANGERS & MAKING NEW FRIENDS.`,
                1: `INTROVERT, SHY & WITHDRAWN, CLIENT OPTS TO SPEND TIME WITH ${obj1} CLOSE FRIENDS THAN MINGLE WITH LARGE GROUPS OF PEOPLE.`,
                2: `SHY, RESTRAINED AND TIMID, CLIENT TENDS TO BE SLOW AND IMPEDED IN SPEECH IN EXPRESSING ${self}. ${subj} ALSO PREFERS ONE OR TWO CLOSE FRIENDS TO LARGE GROUPS.`,
                3: `TIMID AND WITHDRAWN, CLIENT IS SHY AND PREFERS INTERACTING WITH ${obj1} FEW TRUSTED FRIENDS RATHER THAN WITH A BIG CROWD.`
            }
        },
        "I" : {
            "+": {
                0: `TENDER-MINDED, DEPENDENT & SENSITIVE, CLIENT LOVES TO DAY DREAM. ${subj} IS SOMETIMES DEMANDING OF ATTENTION & HELP, IMPATIENT, & IMPRACTICAL. LIKEWISE, ${subj} GENERALLY DISLIKES SIMPLE PEOPLE & LABOR INTENSIVE WORK AS WELL.`,
                1: `GENERALLY CREATIVE, CLIENT IS FOND OF IMAGINING, IS SENTIMENTAL & THOUGHTFUL. ${subj} AT TIMES THOUGH MAY BEG FOR CONSIDERATION & GUIDANCE, MAY BE COMPLAINING & ILLOGICAL. MOREOVER, ${subj} MAY NOT BE IMPRESSED WITH ORDINARY PEOPLE & JOBS THAT REQUIRE A LOT OF MANUAL LABOR.`,
                2: `ARTISTIC WITH A SENTIMENTAL & TACTFUL CHARACTER, CLIENT APPEARS TO BE FOND OF FANTASIES. EVEN SO, ${subj} OFTEN SEEKS FOR RECOGNITION & ASSISTANCE, IS MOODY, AND IS UNREALISTIC AT TIMES. IN ADDITION, ${subj} DOES NOT LIKE PLAIN INDIVIDUALS & JOBS THAT MAY DEMAND A LOT OF MANUAL WORK.`,
                3: `OVER PROTECTIVE & SENSITIVE, CLIENT APPEARS SOFT & DEPENDENT YET ARTISTIC AT THE SAME TIME. HOWEVER, ${subj} IS SOMETIMES SELF-CENTERED, IMPRACTICAL & IMPATIENT. MOREOVER, ${subj} GENERALLY DISLIKES CRUDE PEOPLE & ROUGH OCCUPATIONS.`,
                4: `SYMPATHETIC, SENSITIVE, & IMAGINATIVE, CLIENT HAS ARTISTIC TENDENCIES & CREATIVE. HOWEVER, ${subj} MAYBE SELF-CENTERED, ILLOGICAL, & EASILY GETS IRRITATED AT TIMES. ${subj} ALSO IS NOT FOND OF SIMPLE FOLKS & WORK THAT REQUIRES A LOT OF MANUAL LABOR.`,
                5: `OVER PROTECTIVE & SEEMINGLY DELICATE, CLIENT IS FOND OF FANTASIES, ARTISTIC & CREATIVE. HOWEVER, ${subj} CAN BE RESTRICTIVE, SELF-CENTERED, UNREALISTIC, & COMPLAINING AT TIMES. IN ADDITION, ${subj} SEEMS NOT FOND OF SIMPLE, ORDINARY PEOPLE & JOBS THAT REQUIRE A LOT OF MANUAL LABOR.`,
                6: `SENTIMENTAL & OVERPROTECTIVE, CLIENT IS DEPENDENT & SENSITIVE. LIKEWISE, ${subj} GENERALLY DISLIKES CRUDE PEOPLE & ROUGH OCCUPATIONS. GIVEN THIS COUPLED WITH ${obj1} SENSITIVE NATURE CAN LEAD ${obj2} TO SLOW UP GROUP PERFORMANCE, AND TO UPSET GROUP MORALE BY UNREALISTIC FUSSINESS.`
            },
            "-": {
                0: "DETERMINED & SELF-RELIANT, CLIENT IS STRONG-WILLED, PRACTICAL & INDEPENDENT.",
                1: "LEVEL-HEADED AND SELF-SUPPORTING, CLIENT PERSISTS AS PRAGMATIC AND SELF-GOVERNING.",
                2: `CONFIDENT AND SELF-GOVERNED, CLIENT CAN TAKE ${obj1} OWN ACTION WITHOUT NECESSARILY RELYING ON OTHER PEOPLE’S SUGGESTIONS.`,
                3: "DOWN TO EARTH & INDEPENDENT, CLIENT HAS THE ABILITY TO KEEP A GROUP OPERATING ON A PRACTICAL, REALISTIC & REASONABLE BASIS.",
                4: "SIMPLE YET PRECISE AND TRUTHFUL, CLIENT CAN MOTIVATE THE GROUP TO ACT POSITIVELY TOWARDS THE GROUP’S GOALS.",
                5: "PRACTICAL, REALISTIC AND INDEPENDENT, CLIENT CAN BE RELIED UPON TO MANAGE A GROUP OPERATING ON A LOGICAL, “NO NONSENSE”  BASIS.",
                6: "RATIONAL & PRACTICAL, CLIENT CAN BE COUNTED UPON TO OVERSEE A GROUP WORKING ON A REALISTIC “NO-NONSENSE” BASIS."
            }
        },
        "L" : {
            "+": {
                0: "SUSPICIOUS AND SELF-OPINIONATED, CLIENT TENDS TO BE MISTRUSTING AND DOUBTFUL.",
                1: "DOUBTFUL AND SELF-CENTERED, CLIENT TENDS TO BE SUSPICIOUS OF OTHER PEOPLE’S SINCERITY & MOTIVES.",
                2: "SKEPTICAL AND EGOCENTRIC, CLIENT TENDS TO QUESTION OTHER PEOPLE’S INTENTIONS.",
                3: `TOO FOCUSED ON ${self} AND ${obj1} OPINION, CLIENT IS HARD TO FOOL YET AT THE SAME TIME, FINDS IT DIFFICULT TO TRUST OTHER PEOPLE.`,
                4: `SELF-CENTERED & CONCERNED WITH ${obj1} OWN NEEDS, CLIENT TENDS TO BE CYNICAL & MISTRUSTING OF OTHER PEOPLE.`,
                5: `MISTRUSTING AND DOUBTFUL, CLIENT IS USUALLY DELIBERATE IN ${obj1} ACTIONS, IS GENERALLY FOCUSED ON ${obj1} OWN NEEDS, & MAY, GENERALLY BE A POOR TEAM MEMBER.`,
                6: `GENERALLY SKEPTICAL AND DOUBTFUL OF OTHER PEOPLE’S MOTIVES, CLIENT TENDS TO BE VIGILANT & EXTRA CAREFUL IN DEALING WITH OTHERS. THIS ATTITUDE ${subj} CARRIES EVEN IN PERFORMING GROUP TASKS.`
            },
            "-": {
                0: "RUSTING AND ADAPTABLE, CLIENT IS EASY TO GET ALONG WITH AND A GOOD TEAM WORKER.",
                1: `TRUSTFUL & UNSUSPICIOUS, CLIENT CAN ADUST EASILY WITH OTHER PEOPLE. THIS MAKES ${obj2} A GOOD TEAM PLAYER.`,
                2: "FLEXIBLE AND TRUSTING, CLIENT HAS A PLEASANT PERSONALITY & EASY TO GET ALONG WITH.",
                3: "FLEXIBLE & COOPERATIVE, CLIENT IS TRUSTING, CONCERNED OF OTHER PEOPLE’S WELFARE & GENERALLY GOOD AT TEAMWORK.",
                4: "ACCOMMODATING & UNSUSPICIOUS, CLIENT GENUINELY CARES FOR OTHER PEOPLE & CAN EASILY ADJUST TO SITUATIONS THAT REQUIRE TEAMWORK.",
                5: `OPEN & TRUSTING OF OTHER PEOPLE, CLIENT DEMONSTRATES A WELL ADJUSTED PERSONALITY: ${subj} IS COOPERATIVE & CAN WORK WELL WITH TEAMMATES IN GROUP TASKS.`
            }
        },
        "M" : {
            "+": {
                0: `MOTIVATED BY SELF-DIRECTED INTERESTS, CLIENT IS IMAGINATIVELY CREATIVE, CONCERNED WITH ESSENTIALS, AND OBLIVIOUS OF PARTICULAR PEOPLE AND PHYSICAL REALITIES. ${subj} HOWEVER NEEDS TO BE CAUTIOUS WITH ${obj1} INDIVIDUALITY AS THIS TENDS TO CAUSE ${obj2} TO BE NOT SO COOPERATIVE IN GROUP ACTIVITIES.`,
                1: `PASSIONATE TOWARD SELF-DIRECTED GOALS, CLIENT IS MOTIVATED TO ACT BASED ON ${obj1} SELF-DIRECTED INTEREST. THIS MAY NOT BE BAD IN ITSELF BUT CLIENT NEEDS TO BE AWARE OF THIS TENDENCY AS THIS MAY PREVENT ${obj2} FROM BEING ENTHUSIASTIC TO COLLABORATE IN GROUP TASKS.`,
                2: `MORE FOCUSED ON ${obj1} SELF-DIRECTED GOALS & INTERESTS, CLIENT MAYBE COMMENDED TO BE SELF-MOTIVATED. HOWEVER ${subj} NEEDS TO BE CAREFUL BECAUSE ${obj1} SELF-DIRECTED BEHAVIOR MAY MAKE ${obj2} INSENSITIVE TO OTHER PEOPLE’S CONCERNS & ${obj1} IMMEDIATE ENVIRONMENT.`,
                3: `TOO FOCUSED ON ${obj1} INNER URGENCIES, CLIENT IS IMAGINATIVE, CARELESS OF PRACTICAL MATTERS AND MAYBE ABSENT-MINDED SOMETIMES.`,
                4: `OVERLY CONSCIOUS OF ${obj1} OWN CONCERNS & SELF-DIRECTED INTERSTS, CLIENT IS IMAGINATIVE, INSENSITIVE OF OTHERS, AND IS NOT ALWAYS MENTALLY PRESENT.`,
                5: `TOO PREOCCUPIED WITH ${obj1} OWN CONCERNS & INTERESTS, CLIENT MAY BECOME INSENSITIVE TO THE OTHER PEOPLE AROUND ${obj2} & ${obj1} IMMEDIATE ENVIRONMENT.`,
                6: `INFLUENCED BY INNER URGENCIES, CLIENT’S INNER DIRECTED INTERESTS CAN SOMETIMES LEAD TO UNREALISTIC SITUATIONS ACCOMPANIED BY EXPRESSIVE OUTBURSTS. ${subj} NEEDS TO WATCH OUT OF ${obj1} INDIVIDUALITY AS THIS TENDS TO LEAD  ${obj2} TO BE UNCOOPERATIVE IN GROUP ACTIVITIES.`,
                7: `HIGHLY MOTIVATED BY ${obj1} OWN SELF-DIRECTED GOALS & NEEDS, CLIENT MAY BE OBLIVIOUS OF OTHER PEOPLE’S CONCERNS & ${obj1} IMMEDIATE SURROUNDINGS AS WELL.`,
                8: `OVERLY CONCERN OF ${obj1} OWN SELF-DIRECTED INTERESTS, CLIENT MAY LACK THE INTEREST TO COOPERATE IN GROUP ACTIVITIES & MEET THE IMMDEIATE CONCERNS OF ${obj1} SURROUNDING ENVIRONMENT.`
            },
            "-": {
                0: `PRACTICAL AND CONVENTIONAL, CLIENT IS CONCERNED OVER DETAILS AND IS CAPABLE TO KEEP ${obj1} HEAD DURING CRITICAL TIMES.`,
                1: "SENSIBLE AND TRADITIONAL, CLIENT IS CAPABLE OF LOOKING INTO DETAILS & CAN MANAGE TO STAY CALM EVEN DURING TIMES OF CRISIS.",
                2: "PRAGMATIC AND CONSERVATIVE, CLIENT IS APPREHENSIVE OVER DETAILS AND IS COMPETENT AT REMAINING UNRUFFLED AMIDST ADVERSITY."
            }
        },
        "N" : {
            "+": {
                0: `CLIENT TENDS TO BE SOPHISTICATED, WORLDLY EXPERIENCED, ANALYTICAL AND CLEVER. BUT ${subj} CAN BE HARDHEADED, IF NOT PROPERLY GUIDED.`,
                1: "CLIENT APPEARS TO BE SOPHISTICATED, WORLDLY WISE & KNOWLEDGEABLE. HOWEVER, WITHOUT PROPER GUIDANCE, CLIENT CAN BE TOUGH & DIFFICULT TO HANDLE.",
                2: "ANALYTICAL AND RATIONAL IN APPROACHING SITUATIONS, CLIENT KNOWS THE WAYS OF THE WORLD QUITE WELL. BUT, WITH THE ABSENCE OF REFLECTION & PROPER GUIDANCE, CLIENT MAY APPEAR TOUGH & HARD HEADED.",
                3: `WITH CUNNING AND STRONG PERSONALITY, CLIENT IS FULLY AWARE OF HOW THE WORLD WORKS. STILL, ${subj} NEEDS TO BE MINDFUL OF ${obj1} TENDENCY TO BE HARD HEADED SOMETIMES.`,
                4: `WITH A CALCULATING AND SEEMINGLY PENETRATING PERSONALITY, CLIENT KNOWS THE WAYS OF THIS WORLD QUITE WELL. HOWEVER, ${subj} NEEDS TO WATCH OUT OF ${obj1} TENDENCY TO BE HARD-HEADED SOMETIMES.`,
                5: `CLIENT TENDS TO BE SOPHISTICATED, KNOWLEDGEABLE ABOUT THE WORLD, LOGICAL, AND SHARP. BUT ${subj} CAN BE WILLFUL ON ${obj1} OWN, TO THE EXTENT THAT ${subj} CAN BE HARD HEADED, IF NOT PROPERLY GUIDED.`
            },
            "-": {
                0: `SIMPLE, SPONTANEOUS AND UNSOPHISTICATED, CLIENT EASILY GETS CONTENTED WITH WHATEVER COMES TO ${obj1} LIFE.`,
                1: `UNPRETENTIOUS, PLAIN AND SIMPLE, CLIENT EASILY GETS SATISFIED WITH WHATEVER COMES TO ${obj1} LIFE.`,
                2: `UNCOMPLICATED, UNCONSTRAINED AND NAÏVE, CLIENT IS EFFORTLESSLY APPEASED WITH ANYTHING THAT COMES TO ${obj1} LIFE.`,
                3: `NATURAL AND SPONTANEOUS, CLIENT IS NOT TOO AMBITIOUS AND EASILY GETS CONTENTED WITH WHATEVER COMES TO ${obj1} LIFE.`,
                4: `PLAIN, SIMPLE & NOT OVERLY AMBITIOUS, CLIENT EFFORTLESSLY GETS SATISFIED WITH WHATEVER COMES TO ${obj1} LIFE.`,
                5: `MODEST & HUMBLE, CLIENT EASILY GETS SATISFIED WITH ANYTHING THAT COMES TO ${obj1} LIFE.`
            }
        },
        "O" : {
            "+": {
                0: "CLIENT IS APPREHENSIVE AND A WORRIER, SOMETIMES, WITHOUT VALID REASON AT ALL.",
                1: "CLIENT EASILY GETS NERVOUS AND UNEASY, SOMETIMES, WITHOUT VALID REASON AT ALL.",
                2: `A WORRIER, CLIENT HAS A CHILD LIKE-TENDENCY REACTION TO ANXIETY IN DIFFICULTIES. BECAUSE OF THIS, ${subj} MAY FEEL UNACCEPTED IN GROUPS AND MAY FIND IT DIFFICULT TO PARTICIPATE IN GROUP ACTIVITIES FREELY.`,
                3: `A PERSON WHO WORRIES EASILY, CLIENT MANIFESTS CHILD-LIKE BEHAVIOR AS A RESPONSE TO STRESS WHEN FACING TOUGH TIMES. AS A RESULT, ${subj} MAY HAVE TROUBLE TO JOIN TEAM OR GROUP TASKS/AFFAIRS FREELY.`,
                4: `A PERSON WHO GETS ANXIOUS EASILY, SOMETIMES EVEN WITHOUT VALID REASONS AT ALL, CLIENT MAY POSSIBLY SHOW CHILD-LIKE ATTITUDE AS A RESPONSE TO STRESS. AS A CONSEQUENCE, ${subj} MAY HAVE DIFFICULTY COLLABORATING WITH A TEAM OR GROUP IN THE PERFORMANCE OF A TASK.`
            },
            "-": {
                0: `SELF-ASSURED AND SERENE, CLIENT IS RESILIENT AND SECURE IN ${obj1} CAPACITY TO DO/ACCOMPLISH THINGS.`,
                1: `CONFIDENT AND COMPOSED, CLIENT IS RESILIENT & AWARE OF ${obj1} WORTH & ABILITY AS A PERSON. HOWEVER, BECAUSE OF THIS, ${subj} MAY BE INSENSITIVE TO OTHER PEOPLE’S FEELINGS SOMETIMES.`,
                2: `KNOWING ${obj1} STRENGTHS & WEAKNESSES, CLIENT IS CONFIDENT ENOUGH TO ADMIT WHAT ${subj} CAN & CANNOT DO AS A PERSON. HOWEVER, BECAUSE OF THIS, ${subj} MAY NOT BE TOO CONSIDERATE OF HOW OTHER PEOPLE MAY FEEL SOMETIMES.`,
                3: `CLIENT IS CALM, UNTROUBLED AND HAS A MATURE CONFIDENCE IN ${self} AND ${obj1} CAPACITY TO DEAL WITH THINGS.`,
                4: `RELAXED & COOL, CLIENT KNOWS WHAT ${subj} CAN & CANNOT DO AS A PERSON. AS A RESULT, ${subj} CAN CONFIDENTLY DEAL WITH THE EVENTS/SITUATIONS ${subj} ENCOUNTERS IN LIFE.`,
                5: `COMPOSED AND CONFIDENT, CLIENT SEEMS NOT TO WORRY AS REGARDS THE CHALLENGES ${subj} MAY ENCOUNTER BECAUSE ${subj} KNOWS ${obj1} ABILITY AS A PERSON, PARTICULARLY WHAT ${subj} CAN DO & WHAT ${subj} CANNOT DO.`
            }
        },
        "Q1" : {
            "+": {
                0: `EXPERIMENTING AND CRITICAL, CLIENT IS LIBERAL, ANALYTICAL AND A FREE–THINKER. THUS, ${subj} IS MORE OPEN TO CHANGE AND MORE TOLERANT OF INCONVENIENCE BROUGHT ABOUT BY CHANGE.`,
                1: "LIBERAL, ANALYTICAL & A PROGRESSIVE THINKER, CLIENT IS SOMEONE WHO WELCOMES CHANGE & NEW IDEAS, INCLUDING THE TROUBLE OR DIFFICULTY THAT MAY COME ALONG WITH IT.",
                2: "CRITICAL, EXPERIMENTING & A PROGRESSIVE THINKER, CLIENT IS SOMEONE WHO IS NOT AFRAID OF NEW IDEAS OR CHANGES, INCLUDING THE CHALLENGES THAT MAY COME ALONG WITH THESE CHANGES.",
                3: "A FREE THINKER, CLIENT IS WELL INFORMED, MORE INCLINED TO EXPERIMENT IN LIFE GENERALLY, AND MORE TOLERANT OF INCONVENIENCE AND CHANGE.",
                4: `AN INDEPENDENT, PROGRESSIVE THINKER, CLIENT IS INCLINED TO EXPERIMENT & TRY SOMETHING NEW IN LIFE. ${subj} IS MORE OPEN MINDED WHEN IT COMES TO SACRIFICES OR CHALLENGES THAT MAY GO ALONG WITH THESE CHANGES.`,
                5: `OPEN MINDED & WELL INFORMED, CLIENT IS LIBERAL AND ANALYTICAL. ${subj} LOOKS AT NEW EXPERIENCES AS CHALLENGES, INCLUDING THE INCONVENIENCE BROGUHT ABOUT BY THESE CHANGES.`,
                6: `LIBERAL AND ANALYTICAL, CLIENT IS MORE OPEN TO CHANGE AND INCONVENIENCE BROUGHT ABOUT BY CHANGE. LIKEWISE, ${subj} IS WELL INFORMED AND LESS INCLINED TO MORALIZE.`,
                7: `LIBERAL-MINDED & FREE OF BIASES, CLIENT DOES NOT SHUT ${obj1} MIND TO MODERN IDEAS. ${subj} IS OPEN TO CHANGE & THE INCONVENIENCE BROUGHT ABOUT BY CHANGE.`,
                8: `UNPREJUDICED & BROAD-MINDED, CLIENT IS SUPPORTIVE OF NEW PLANS, SUGGESTIONS OR DESIGNS. ${subj} EQUATES CHANGE WITH PROGRESS, EVEN IF AT TIMES, IT MAY ENTAIL SACRIFICES.`
            },
            "-": {
                0: `CONSERVATIVE, CLIENT HIGHLY RESPECTS ESTABLISHED IDEAS AND FOLLOWS THE WAYS THAT ARE COMMONLY PRACTICED BY ${obj1} PEOPLE/ AND/OR ANCESTORS.`,
                1: `TRADITIONALIST, CLIENT UPHOLDS DEFINED IDEAS AND PURSUES THE METHODS THAT ${obj1} PEOPLE AND/OR FOREFATHERS COMMONLY USED.`,
                2: `CONSERVATIVE, CLIENT PREFERS OLD, RELIABLE VIEWS AND FOLLOWS IN ${obj1} FOREBEARS AND FOREPARENTS’ FOOTSTEPS.`,
                3: `GROUP DEPENDENT, CLIENT TENDS TO GO ALONG WITH THE GROUP. ${subj} LIKES TO BE ASSURED THAT ${obj1} ACTIONS AND DECISIONS ARE IN ACCORD TO THE EXPECTATIONS OF THE GROUP.`,
                4: `INFLUENCED BY ${obj1} GROUP, CLIENT IS COMMUNITY-DRIVEN AND FOLLOWS THE APPROVED WAYS OF ${obj1} GROUP. ${subj} WANTS ASSURANCE THAT ${obj1} BEHAVIOR AND CHOICES ARE IN CONSISTENT WITH THE GOALS OF THE GROUP.`,
                5: `CLIENT IS GROUP RELIANT AND SEEMS TO GO TOGETHER WITH THE GROUP. ${subj} NEEDS TO KNOW THAT ${obj1} BEHAVIOR AND MORAL CHOICES MEET THE STANDARDS OF THE GROUP.`,
                6: `CLIENT IS CONFIDENT IN WHAT ${subj} HAS BEEN TAUGHT TO BELIEVE AND ACCEPTS THE “TRIED AND TRUE”, DESPITE INCONSISTENCIES, EVEN IF SOMETHING ELSE MIGHT BE BETTER.`,
                7: `CLIENT IS CERTAIN OF WHAT ${subj} HAS BEEN BROUGHT UP TO AND EMBRACES THE “TESTED AND VERIFIED” AMIDST INACCURACIES, EVEN THOUGH SOMETHING ELSE MIGHT BE MORE APPROPRIATE.`,
                8: `CLIENT IS MORE SELF-ASSURED IN WHAT ${subj} HAS BEEN BROUGHT UP TO AND ACKNOWLEDGES THE \"TRIED AND TRUE\" IN THE FACE OF FACTUAL INACCURACIES, ALTHOUGH SOMETHING NEW WOULD BE EQUALLY DESIRABLE, OR SOMETIMES, EVEN BETTER.`
            }
        },
        "Q2" : {
            "+": {
                0: `TEMPERAMENTALLY INDEPENDENT AND SELF SUFFICIENT, CLIENT IS USED TO GO ${obj1} OWN WAY, MAKE DECISIONS AND TAKE ACTIONS ON ${obj1} OWN.`,
                1: `TEMPERAMENTALLY INDEPENDENT AND SELF-SUSTAINED, CLIENT IS CAPABLE TO GO ${obj1} OWN WAY, MAKE CHOICES & TAKE MEASURES OR ACTIONS ON ${obj1} OWN.`,
                2: `AUTONOMOUS IN TERMS OF TEMPERAMENT, CLIENT IS INDEPENDENT & CAN MAKE DECISIONS & TAKE ACTION ON ${obj1} OWN.`,
                3: `RESOURCEFUL AND SELF-SUFFICIENT, CLIENT PREFERS ${obj1} OWN DECISIONS AND TAKES ACTIONS ON ${obj1} OWN. LIKEWISE, BEING INDEPENDENT, ${subj} DOES NOT NECESSARILY DISLIKE PEOPLE BUT MAY NOT NEED THEIR AGREEMENT OR SUPPORT.`,
                4: `RESOURCEFUL & INDEPENDENT, CLIENT FAVORS ${obj1} OWN CHOICES AND TAKES ACTIONS ON ${obj1} OWN. SIMILARLY, BEING AUTONOMOUS, ${subj} DOES NOT NECESSARILY DISLIKE PEOPLE, BUT MAY NOT NECESSARILY NEED THEIR APPROVAL OR ASSISTANCE.`,
                5: `SELF-SUSTAINED & RESOURCEFUL, CLIENT PREFERS ${obj1} OWN DECISIONS AND ACTIONS. ${subj} DOES NOT DISLIKE PEOPLE BUT ${subj} DOES NOT NECESSARILY NEED THEIR AGREEMENT OR SUPPORT.`,
                6: `INDEPENDENT AND RESOURCEFUL, CLIENT IS ACCUSTOMED TO MAKE DECISIONS AND TAKE ACTIONS ON ${obj1} OWN. LIKEWISE, ${subj} DISCOUNTS PUBLIC OPINIONS BUT IS NOT NECESSARILY DOMINANT IN ${obj1} RELATIONS WITH OTHERS.`,
                7: `SELF-RELIANT, RESOURCEFUL & CREATIVE, CLIENT CHOOSES ${obj1} OWN OPTIONS IN MAKING DECISIONS REGARDING THE ACTIONS ${subj} IS ABOUT TO DO. ${obj1} SENSE OF AUTONOMY CAUSES ${obj2} NOT TO BE CONCERNED OF OTHER PEOPLE'S APPROVAL OR ASSISTANCE. HOWEVER, IT DOES NOT MEAN THAT ${subj} DISLIKES PEOPLE.`,
                8: `AUTONOMOUS, RESOURCEFUL & CAPABLE, CLIENT CAN COME UP WITH DECISIONS AND ACTIONS ON ${obj1} OWN. ${subj} DOES NOT DISLIKE PEOPLE BUT MAY NOT NECESSARILY AGREE WITH OTHER PEOPLE’S SUGGESTIONS OR OPINIONS. LIKEWISE, THOUGH RESOURCEFUL & CAPABLE, ${subj} IS NOT NECESSARILY DOMINANT IN ${obj1} RELATIONSHIPS WITH OTHERS.`
            },
            "-": {
                0: `“JOINER” AND A SOUND FOLLOWER, CLIENT PREFERS TO WORK AND MAKE DECISIONS WITH OTHER PEOPLE. ${subj} DEPENDS ON OTHERS FOR SOCIAL APPROVAL AND ADMIRATION.`,
                1: `A “JOINER” AND A RELIABLE MEMBER, CLIENT FAVORS TO DO TASKS AND TO REACH A DECISION WITH OTHER INDIVIDUALS. ${subj} ENJOYS AND RELIES ON OTHER PEOPLE FOR PUBLIC APPROVAL AND APPRECIATION.`,
                2: `AN “INVOLVER” AND A SENSIBLE MEMBER, CLIENT CHOOSES TO PERFORM AND TO MAKE A RESOLUTION WITH OTHER INDIVIDUALS. ${subj} COUNTS ON OTHER PEOPLE FOR GROUP VALIDATION AND REGARD.`
            }
        },
        "Q3" : {
            "+": {
                0: `SOCIALLY PRECISE, CLIENT TENDS TO HAVE STRONG CONTROL OVER ${obj1} EMOTIONS AND GENERAL BEHAVIOR.`,
                1: `WITH A GREAT NEED TO BE SOCIALLY ACCEPTABLE, CLIENT SEEMS TO MASTER CONTROL OVER ${obj1} FEELINGS & GENERAL BEHAVIOR.`,
                2: `ALWAYS PUTTING IN MIND WHAT OTHER PEOPLE MAY SAY, CLIENT SEES TO IT THAT ${obj1} FEELINGS & BEHAVIOR ARE UNDER CONTROL IN SUCH A WAY THAT THESE ARE IN ACCORD WITH SOCIETY’S NORMS.`,
                3: `FOLLOWING ${obj1} SELF-IMAGE, CLIENT IS INCLINED TO BE SOCIALLY AWARE AND CAREFUL. ${subj} VALUES HIGHLY ${obj1} “SELF-RESPECT” AND SOCIAL REPUTATION.`,
                4: `BEHAVING CONSISTENTLY WITH ${obj1} SELF-IDENTITY, SELF-WORTH & CREDIBILITY AS A PERSON, CLIENT BEHAVES IN ACCORD WITH SOCIETY’S EXPECTATIONS.`
            },
            "-": {
                0: `CARELESS OF PROTOCOL, CLIENT TENDS TO FOLLOW ${obj1} OWN URGES AND IS NOT VERY MUCH BOTHERED BY WILL CONTROL AND REGARD FOR SOCIAL DEMAND.`,
                1: `CARELESS WITH THE RULES OF CONDUCT, CLIENT IS INCLINED TO ACT IN ACCORDANCE WITH ${obj1} OWN DESIRES AND IS NOT NECESSARILY DISTURBED BY WILL REGULATION AND SOCIETAL EXPECTATIONS.`,
                2: `NOT OVERLY CONCERNED WITH THE CODE OF CONDUCT, CLIENT LEANS TO OPERATE BASED ON ${obj1} OWN DRIVES AND IS NOT TROUBLED BY FREEWILL REGULATION AND SCRUTINY OF SOCIAL EXPECTATIONS.`,
                3: "CARRYING AN INNER SELF-CONFLICT, CLIENT MAY FIND IT DIFFICULT TO BE CONTROLLED BY RULES SIMPLY BECAUSE THERE ARE INNER URGES/DRIVES THAT ARE TOO STRONG THAT CLIENT MAY FIND DIFFICULT TO CONTROL.",
                4: `CONFLICTED WITH ${obj1} INNER IMPULSES AND ${obj1} MORALS, THE CLIENT MAY HAVE PROBLEMS WITH FOLLOWING RULES BECAUSE OF ${obj1} STRONG INNER URGES WHICH ${subj} MAY FIND HARD TO REGULATE.`,
                5: `EXPERIENCING A CONFLICT BETWEEN ${obj1} INNER URGES & THE RULES SET BY SOCIETY, CLIENT MAY FIND ${self} HAVING SOME DIFFICULTY FOLLOWING THE NORMS OF CONDUCT BECAUSE THE INNER DRIVE OR URGES CAN BE TOO STRONG TO CONTROL.`,
                6: `NOT BOTHERED BY WILL CONTROL, CLIENT MAY NOT BE OVERLY CONSIDERATE AND MAY FEEL MAL-ADJUSTED SINCE ${subj} MAY FIND IT HARD TO CONTROL ${obj1} INNER URGES THAT NEED TO BE RELEASED.`
            }
        },
        "Q4" : {
            "+": {
                0: `TENSE INSIDE, CLIENT TENDS UNABLE TO RELEASE THE TENSION CAUSED BY SOME UNRESOLVED FRUSTRATIONS THAT ${subj} HAS EXPERIENCED IN THE PAST. LIKEWISE IN GROUPS, ${subj} MAY NOT PUT SO MUCH SIGNIFICANCE ON THE VALUE OF LEADERSHIP, UNITY AND ORDER.`,
                1: `STRAINED & NERVOUS FROM THE INSIDE, CLIENT HAS YET TO EXPRESS THIS TENSION INSIDE OF ${obj2} THAT MAY HAVE BEEN UNCONSCIOUSLY KEPT THERE UNRESOLVED FOR A LONG TIME ALREADY. LIKEWISE, WHEN INTERACTING WITH OTHER PEOPLE, ${subj} MAY NOT PUT SO MUCH VALUE ON GOVERNANCE OR LEADERSHIP, COOPERATION & ORDER.`,
                2: `JITTERY ON THE INSIDE, THE INDIVIDUAL SEEMS UNABLE TO RELAX. CERTAIN UNEXPRESSED GRIEVANCES IN THE PAST SEEMED TO HAVE BEEN DISTURBING ${obj2} AT PRESENT. SIMILARLY, WHEN WITH OTHER PEOPLE, ${subj} HAS THE TENDENCY NOT TO PUT SO MUCH IMPORTANCE ON AUTHORITY, HARMONY, AND THE LAW.`,
                3: `EXCITABLE, RESTLESS, FRETFUL, AND IMPATIENT, CLIENT IS OFTEN FATIGUED AND YET, IS NOT CAPABLE OF RELEASING THE CAUSE OF THE TENSION. LIKEWISE, WHEN INTERACTING WITH OTHER PEOPLE, ${subj} MAY NOT PUT SO MUCH VALUE ON ORDER, LEADERSHIP AND UNITY.`,
                4: `AGITATED, FIDGETY, PANICKY, AND ANXIOUS INSIDE, CLIENT APPEARS TO BE RESTLESS YET UNABLE TO RELEASE THE SOURCE OF THE STRESS. SIMILARLY, IN DEALING WITH OTHER PEOPLE, ${subj} MIGHT NOT ALWAYS VALUE STRUCTURE, GOVERNANCE, OR SOLIDARITY AS MUCH.`,
                5: `RESTLESS AND IMPATIENT, CLIENT HAS UNRESOLVED FRUSTRATIONS THAT REMAIN UNRELEASED AND STILL BOTHER ${obj2} AT PRESENT. LIKEWISE IN GROUPS, ${subj} MAY TAKE A POOR VIEW OF THE IMPORTANCE OF UNITY, ORDER AND LEADERSHIP.`
            },
            "-": {
                0: `RELAXED AND COOL, CLIENT IS COMPOSED AND SATISFIED. IN SOME SITUATIONS, ${obj1} OVER CONTENTMENT CAN LEAD TO LACK OF DRIVE AND BELOW AVERAGE PERFORMANCE.`,
                1: `CALM & GENTLE, CLIENT REMAINS COMPOSED & CONTENTED. IN SOME SITUATIONS, ${obj1} SENSE OF CONTENTMENT CAN LEAD TO LACK OF MOTIVATION TO ACHIEVE MORE THAN THE AVERAGE PERFORMANCE.`,
                2: `CONTENTED OF ${obj1} PRESENT STATE OR SITUATION, CLIENT MAY SIMPLY ACCEPT ${obj1} PRESENT LIFE AS IT IS. IN SOME INSTANCES THOUGH, THIS SENSE OF LIFE SATISFSACTION CAN LEAD TO LACK OF ENTHUSIASM TO EXCEL, THUS MAY PRODUCE BELOW AVERAGE PERFORMANCE.`,
                3: `COMPOSED AND SATISFIED, CLIENT IS SEDATE AND RELAXED. HOWEVER, ${subj} MAY NEED TO WATCH OUT OF ${obj1} TENDENCY TO BE LESS DRIVEN AS A CONSEQUENCE OF CONTENTMENT AND OVERSATISFACTION.`,
                4: `COMPOSED & CONTENTED, CLIENT IS SERENE & COOL. HOWEVER, ${subj} MAY NEED TO BE WATCHFUL OF ${obj1} INCLINATION TO SIMPLY RELAX AS A RESULT OF THIS SERENITY AS IT CAN LEAD TO BELOW AVERAGE PERFORMANCE.`,
                5: `SELF-CONTAINED & AT PEACE WITH ${obj1} THE WORLD, CLIENT IS CALM & CONTENTED. HOWEVER, ${subj} MAY NEED TO PAY MORE ATTENTION TO THIS TENDENCY AS THIS CAN LEAD TO SUBSTANDARD PERFORMANCE.`
            }
        }
    };

    //INTERPRETING THE RESULTS
    let random_num = 0;

    /*
    * STRENGTHS & WEAKNESSES RESULTS
    */
    //Append the results and weaknesses here
    let strengths = [];
    let weaknesses = [];

    /*
    * SCORING EACH ANSWER
    */
    testAnswers.forEach(answer => {
        let ques = answer.name;
        let ans = answer.value.toUpperCase();

        //check if the question is in the factor array
        if(factors.hasOwnProperty(ques)) {
            let factor = factors[ques][ans];

            if(factor !== undefined) {
                switch(factor){
                    case "A":
                        if(ans === '?'){
                            factorA+=1;
                            break;
                        } else {
                            factorA+=2;
                            break;
                        }

                    case "C":
                        if(ans === '?'){
                            factorC+=1;
                            break;
                        } else {
                            factorC+=2;
                            break;
                        }

                    case "E":
                        if(ans === '?'){
                            factorE+=1;
                            break;
                        } else {
                            factorE+=2;
                            break;
                        }

                    case "F":
                        if(ans === '?'){
                            factorF+=1;
                            break;
                        } else {
                            factorF+=2;
                            break;
                        }

                    case "G":
                        if(ans === '?'){
                            factorG+=1;
                            break;
                        } else {
                            factorG+=2;
                            break;
                        }

                    case "H":
                        if(ans === '?'){
                            factorH+=1;
                            break;
                        } else {
                            factorH+=2;
                            break;
                        }

                    case "I":
                        if(ans === '?'){
                            factorI+=1;
                            break;
                        } else {
                            factorI+=2;
                            break;
                        }

                    case "L":
                        if(ans === '?'){
                            factorL+=1;
                            break;
                        } else {
                            factorL+=2;
                            break;
                        }

                    case "M":
                        if(ans === '?'){
                            factorM+=1;
                            break;
                        } else {
                            factorM+=2;
                            break;
                        }

                    case "N":
                        if(ans === '?'){
                            factorN+=1;
                            break;
                        } else {
                            factorN+=2;
                            break;
                        }

                    case "O":
                        if(ans === '?'){
                            factorO+=1;
                            break;
                        } else {
                            factorO+=2;
                            break;
                        }

                    case "Q1":
                        if(ans === '?'){
                            factorQ1+=1;
                            break;
                        } else {
                            factorQ1+=2;
                            break;
                        }

                    case "Q2":
                        if(ans === '?'){
                            factorQ2+=1;
                            break;
                        } else {
                            factorQ2+=2;
                            break;
                        }

                    case "Q3":
                        if(ans === '?'){
                            factorQ3+=1;
                            break;
                        } else {
                            factorQ3+=2;
                            break;
                        }

                    case "Q4":
                        if(ans === '?'){
                            factorQ4+=1;
                            break;
                        } else {
                            factorQ4+=2;
                            break;
                        }

                    default:
                        break;

                }
            }
            else {
                console.log(`Answer ${ans} for question ${ques} not found. Skip.`)
            }
        }
        else{
            console.log(`Question: ${ques} not found. Skip.`)
        }
    });

    // To view the numerical scores of each factor
    console.log(`Factor A: ${factorA}`);
    console.log(`Factor C: ${factorC}`);
    console.log(`Factor E: ${factorE}`);
    console.log(`Factor F: ${factorF}`);
    console.log(`Factor G: ${factorG}`);
    console.log(`Factor H: ${factorH}`);
    console.log(`Factor I: ${factorI}`);
    console.log(`Factor L: ${factorL}`);
    console.log(`Factor M: ${factorM}`);
    console.log(`Factor N: ${factorN}`);
    console.log(`Factor O: ${factorO}`);
    console.log(`Factor Q1: ${factorQ1}`);
    console.log(`Factor Q2: ${factorQ2}`);
    console.log(`Factor Q3: ${factorQ3}`);
    console.log(`Factor Q4: ${factorQ4}`);

    /*
    * GETTING FACTOR INTERPRETATION
    */

    // FACTOR A
    if (userSex === 'Female'){
        if (factorA >= 16 && factorA <= 22){
            random_num = Math.floor(Math.random() * 7);
            strengths.push(interpretations["A"]["+"][random_num]);
            console.log(`Factor A result: ${strengths[strengths.length - 1]}+${random_num}`);
        }

        else if (factorA >= 0 && factorA <= 13){
            random_num = Math.floor(Math.random() * 7);
            weaknesses.push(interpretations["A"]["-"][random_num]);
            console.log(`Factor A result: ${weaknesses[weaknesses.length-1]}-${random_num}`);
        }

        else {
            console.log(`Score is neutral. Skip`);
        }
    }
    else if(userSex==='Male'){
        if (factorA >= 14 && factorA <= 22){
            random_num = Math.floor(Math.random() * 7);
            strengths.push(interpretations["A"]["+"][random_num]);
            console.log(`Factor A result: ${strengths[strengths.length - 1]}+${random_num}`);
        }

        else if (factorA >= 0 && factorA <= 10){
            random_num = Math.floor(Math.random() * 7);
            weaknesses.push(interpretations["A"]["-"][random_num]);
            console.log(`Factor A result: ${weaknesses[weaknesses.length-1]}-${random_num}`);
        }

        else {
            console.log(`Score is neutral. Skip`);
        }
    }
    else{
        console.log(`userSex is invalid.`);
    }

    // FACTOR C
    if (factorC >= 14 && factorC <= 20){
        random_num = Math.floor(Math.random() * 4);
        // results["C"] = interpretations["C"]["+"][random_num];
        strengths.push(interpretations["C"]["-"][random_num]);
        console.log(`Factor C result: ${strengths[strengths.length-1]}+${random_num}`);
    }

    else if (factorC >= 0 && factorC <= 10){
        random_num = Math.floor(Math.random() * 8);
        weaknesses.push(interpretations["C"]["-"][random_num]);
        console.log(`Factor C result: ${weaknesses[weaknesses.length-1]}-${random_num}`);
    }

    else {
        console.log(`Score is neutral. Skip`);
    }

    // FACTOR E
    if(userSex==='Female'){
        if (factorE >= 13 && factorE <= 20){
            random_num = Math.floor(Math.random() * 5);
            weaknesses.push(interpretations["E"]["+"][random_num]);
            console.log(`Factor E result: ${weaknesses[weaknesses.length-1]}+${random_num}`);
        }

        else if (factorE >= 0 && factorE <= 10){
            random_num = Math.floor(Math.random() * 9);
            strengths.push(interpretations["E"]["-"][random_num]);
            console.log(`Factor E result: ${strengths[strengths.length-1]}-${random_num}`);
        }

        else {
            console.log(`Score is neutral. Skip`);
        }
    }
    else if (userSex==='Male'){
        if (factorE >= 14 && factorE <= 20){
            random_num = Math.floor(Math.random() * 5);
            weaknesses.push(interpretations["E"]["+"][random_num]);
            console.log(`Factor E result: ${weaknesses[weaknesses.length-1]}+${random_num}`);
        }

        else if (factorE >= 0 && factorE <= 11){
            random_num = Math.floor(Math.random() * 9);
            strengths.push(interpretations["E"]["-"][random_num]);
            console.log(`Factor E result: ${strengths[strengths.length-1]}-${random_num}`);
        }

        else {
            console.log(`Score is neutral. Skip`);
        }
    }
    else {
        console.log(`userSex is invalid.`);
    }

    // FACTOR F
    if (factorF >= 12 && factorF <= 20){
        random_num = Math.floor(Math.random() * 5);
        strengths.push(interpretations["F"]["+"][random_num]);
        console.log(`Factor F result: ${strengths[strengths.length-1]}+${random_num}`);
    }

    else if (factorF >= 0 && factorF <= 8){
        random_num = Math.floor(Math.random() * 6);
        strengths.push(interpretations["F"]["-"][random_num]);
        console.log(`Factor F result: ${strengths[strengths.length-1]}-${random_num}`);
    }

    else {
        console.log(`Score is neutral. Skip`);
    }

    // FACTOR H
    if (factorH >= 11 && factorH <= 20){
        random_num = Math.floor(Math.random() * 6);
        strengths.push(interpretations["H"]["+"][random_num]);
        console.log(`Factor H result: ${strengths[strengths.length-1]}+${random_num}`);
    }

    else if (factorH >= 0 && factorH <= 6){
        random_num = Math.floor(Math.random() * 4);
        weaknesses.push(interpretations["H"]["-"][random_num]);
        console.log(`Factor H result: ${weaknesses[weaknesses.length-1]}-${random_num}`);
    }

    else {
        console.log(`Score is neutral. Skip`);
    }

    // FACTOR I
    if(userSex==='Female'){
        if (factorI >= 16 && factorI <= 22){
            random_num = Math.floor(Math.random() * 7);
            weaknesses.push(interpretations["I"]["+"][random_num]);
            console.log(`Factor I result: ${weaknesses[weaknesses.length-1]}+${random_num}`);
        }

        else if (factorI >= 0 && factorI <= 13){
            random_num = Math.floor(Math.random() * 7);
            strengths.push(interpretations["I"]["-"][random_num]);
            console.log(`Factor I result: ${strengths[strengths.length-1]}-${random_num}`);
        }

        else {
            console.log(`Score is neutral. Skip`);
        }
    }
    else if(userSex==='Male'){
        if (factorI >= 9 && factorI <= 22){
            random_num = Math.floor(Math.random() * 7);
            weaknesses.push(interpretations["I"]["+"][random_num]);
            console.log(`Factor I result: ${weaknesses[weaknesses.length-1]}+${random_num}`);
        }

        else if (factorI >= 0 && factorI <= 6){
            random_num = Math.floor(Math.random() * 7);
            strengths.push(interpretations["I"]["-"][random_num]);
            console.log(`Factor I result: ${strengths[strengths.length-1]}-${random_num}`);
        }

        else {
            console.log(`Score is neutral. Skip`);
        }
    }
    else {
        console.log(`userSex is invalid.`);
    }

    // FACTOR L
    if (factorL >= 12 && factorL <= 20){
        random_num = Math.floor(Math.random() * 7);
        weaknesses.push(interpretations["L"]["+"][random_num]);
        console.log(`Factor L result: ${weaknesses[weaknesses.length-1]}+${random_num}`);
    }

    else if (factorL >= 0 && factorL <= 8){
        random_num = Math.floor(Math.random() * 6);
        strengths.push(interpretations["L"]["-"][random_num]);
        console.log(`Factor L result: ${strengths[strengths.length-1]}-${random_num}`);
    }

    else {
        console.log(`Score is neutral. Skip`);
    }

    // FACTOR M
    if (factorM >= 8 && factorM <= 22){
        random_num = Math.floor(Math.random() * 9);
        strengths.push(interpretations["M"]["+"][random_num]);
        console.log(`Factor M result: ${strengths[strengths.length-1]}+${random_num}`);
    }

    else if (factorM >= 0 && factorM <= 4){
        random_num = Math.floor(Math.random() * 3);
        strengths.push(interpretations["M"]["-"][random_num]);
        console.log(`Factor M result: ${strengths[strengths.length-1]}-${random_num}`);
    }

    else {
        console.log(`Score is neutral. Skip`);
    }

    // FACTOR N
    if (factorN >= 12 && factorN <= 20){
        random_num = Math.floor(Math.random() * 6);
        weaknesses.push(interpretations["N"]["+"][random_num]);
        console.log(`Factor N result: ${weaknesses[weaknesses.length-1]}+${random_num}`);
    }

    else if (factorN >= 0 && factorN <= 8){
        random_num = Math.floor(Math.random() * 6);
        strengths.push(interpretations["N"]["-"][random_num]);
        console.log(`Factor N result: ${strengths[strengths.length-1]}-${random_num}`);
    }

    else {
        console.log(`Score is neutral. Skip`);
    }

    // FACTOR O
    if (factorO >= 13 && factorO <= 20){
        random_num = Math.floor(Math.random() * 5);
        weaknesses.push(interpretations["O"]["+"][random_num]);
        console.log(`Factor O result: ${weaknesses[weaknesses.length-1]}+${random_num}`);
    }

    else if (factorO >= 0 && factorO <= 8){
        random_num = Math.floor(Math.random() * 6);
        strengths.push(interpretations["O"]["-"][random_num]);
        console.log(`Factor O result: ${strengths[strengths.length-1]}-${random_num}`);
    }

    else {
        console.log(`Score is neutral. Skip`);
    }

    // FACTOR Q1
    if (factorQ1 >= 17 && factorQ1 <= 28){
        random_num = Math.floor(Math.random() * 9);
        strengths.push(interpretations["Q1"]["+"][random_num]);
        console.log(`Factor Q1 result: ${strengths[strengths.length-1]}+${random_num}`);
    }

    else if (factorQ1 >= 0 && factorQ1 <= 13){
        random_num = Math.floor(Math.random() * 9);
        strengths.push(interpretations["Q1"]["-"][random_num]);
        console.log(`Factor Q1 result: ${strengths[strengths.length-1]}-${random_num}`);
    }

    else {
        console.log(`Score is neutral. Skip`);;
    }

    // FACTOR Q2
    if (factorQ2 >= 9 && factorQ2 <= 20){
        random_num = Math.floor(Math.random() * 9);
        strengths.push(interpretations["Q2"]["+"][random_num]);
        console.log(`Factor Q2 result: ${strengths[strengths.length-1]}+${random_num}`);
    }

    else if (factorQ2 >= 0 && factorQ2 <= 5){
        random_num = Math.floor(Math.random() * 3);
        strengths.push(interpretations["Q2"]["-"][random_num]);
        console.log(`Factor Q2 result: ${strengths[strengths.length-1]}-${random_num}`);
    }

    else {
        console.log(`Score is neutral. Skip`);;
    }

    // FACTOR Q3
    if (factorQ3 >= 13 && factorQ3 <= 20){
        random_num = Math.floor(Math.random() * 5);
        strengths.push(interpretations["Q3"]["+"][random_num]);
        console.log(`Factor Q3 result: ${strengths[strengths.length-1]}+${random_num}`);
    }

    else if (factorQ3 >= 0 && factorQ3 <= 9){
        random_num = Math.floor(Math.random() * 7);
        weaknesses.push(interpretations["Q3"]["-"][random_num]);
        console.log(`Factor Q3 result: ${weaknesses[weaknesses.length-1]}-${random_num}`);
    }

    else {
        console.log(`Score is neutral. Skip`);;
    }

    // FACTOR Q4
    if (factorQ4 >= 12 && factorQ4 <= 20){
        random_num = Math.floor(Math.random() * 6);
        weaknesses.push(interpretations["Q4"]["+"][random_num]);
        console.log(`Factor Q4 result: ${weaknesses[weaknesses.length-1]}+${random_num}`);
    }

    else if (factorQ4 >= 0 && factorQ4 <= 8){
        random_num = Math.floor(Math.random() * 6);
        strengths.push(interpretations["Q4"]["-"][random_num]);
        console.log(`Factor Q4 result: ${strengths[strengths.length-1]}-${random_num}`);
    }

    else {
        console.log(`Score is neutral. Skip`);;
    }

    // FACTOR G
    if (factorG >= 15 && factorG <= 22){
        random_num = Math.floor(Math.random() * 5);
        strengths.push(interpretations["G"]["+"][random_num]);
        console.log(`Factor G result: ${strengths[strengths.length-1]}+${random_num}`);
    }

    else if (factorG >= 0 && factorG <= 11){
        random_num = Math.floor(Math.random() * 9);
        weaknesses.push(interpretations["G"]["-"][random_num]);
        console.log(`Factor G result: ${weaknesses[weaknesses.length-1]}-${random_num}`);
    }

    else {
        console.log(`Score is neutral. Skip`);
    }

    console.log(strengths);
    console.log(weaknesses);

    return {
        strengths,
        weaknesses
    }
}

/*
* PRINTING RESULTS
*/
function printResults(strengths, weaknesses){
    // PRINT STRENGTHS RESULT
    let strengthsList = document.getElementById("strengthsList");

    strengthsList.style.listStyleType = "none";

    for (let key in strengths){
        if(strengths.hasOwnProperty(key)){

            // console.log(key);

            let listItem = document.createElement("li");
            listItem.textContent = strengths[key];

            //Styles
            listItem.style.marginBottom = "40px";

            strengthsList.appendChild(listItem);
        }
    }

    //PRINT WEAKNESSES RESULT
    let weaknessesList = document.getElementById("weaknessesList");

    weaknessesList.style.listStyleType = "none";

    for (let key in weaknesses){
        if(weaknesses.hasOwnProperty(key)){

            // console.log(key);

            let listItem = document.createElement("li");
            listItem.textContent = weaknesses[key];

            //Styles
            listItem.style.marginBottom = "40px";

            weaknessesList.appendChild(listItem);
        }
    }
}

