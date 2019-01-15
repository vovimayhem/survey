<?php
define("QUESTIONS", array(
    'question1' => "1. On a scale of 1 to 5 stars, how would you rate your final resolution with the IRS and/or State?",
    'question2' => "2. On a scale of 1 to 5 stars, how would you rate your overall customer service expecience with Community Tax?",
    'question3' => "3. On a scale of 1 to 5 stars, how would you rate the service received from your licensed  tax practitioner?",
    'question4' => "4. On a scale of 1 to 5 stars, how wolud you rate the service received from your tax preparer responsible for preparing your tax returns?",
    'question5' => "5. Will you be returning to Community Tax to prepare your anual tax returns?",
    'question6' => "Please provide any additional feedback that you wish to share with Community Tax"
))
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Survey</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/starability-all.min.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Basic|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/rating.css">
</head>
<body>
    <div class="main-survey" style="position: relative;">
        <div class="content-survey">
            <form id="form-survey" action="{{ route('submit') }}" method="POST">
                @csrf

                <div class="bloque-1 relative flex justify-center">
                    <div class="box-question">

                        <div class="box-content">
                            <div class="question">
                                <h2><?= QUESTIONS["question1"]; ?></h2>
                            </div>
                            <div class="ranking-star">
                                <fieldset class="rating rating-left">

                                    <input type="radio" id="star5" name="rating1" value="5" /><label for="star5" class="margin-right-none"><span class="great">GREAT</span></label>
                                    <input type="radio" id="star4" name="rating1" value="4" /><label for="star4" ></label>
                                    <input type="radio" id="star3" name="rating1" value="3" /><label for="star3" ></label>
                                    <input type="radio" id="star2" name="rating1" value="2" /><label for="star2" ></label>
                                    <input type="radio" id="star1" name="rating1" value="1" /><label for="star1"><span class="nogreat">NOT GREAT</span></label>

                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="box-img img1">
                        <img src="img/couple-1.png" alt="">
                    </div>
                </div>

                <div class="bloque-2 relative flex  flex-reverse justify-center">
                    <div class="box-question">
                        <div class="box-content">                           
                            <div class="question">
                                <h2><?= QUESTIONS["question2"]; ?></h2>
                            </div>
                            <div class="ranking-star">

                                <fieldset class="rating rating-right">
                                    <input type="radio" id="star10" name="rating2" value="5" /><label for="star10" class="margin-right-none"><span class="great">GREAT</span></label>
                                    <input type="radio" id="star9" name="rating2" value="4" /><label for="star9" ></label>
                                    <input type="radio" id="star8" name="rating2" value="3" /><label for="star8" ></label>
                                    <input type="radio" id="star7" name="rating2" value="2" /><label for="star7" ></label>
                                    <input type="radio" id="star6" name="rating2" value="1" /><label for="star6"><span class="nogreat">NOT GREAT</span></label>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="box-img img2">
                        <img src="img/Female-Customer-Service-Professional.png" alt="">
                    </div>
                </div>

                <div class="bloque-3 relative flex justify-center">
                    <div class="box-question">
                        <div class="box-content">                           
                            <div class="question">
                                <h2><?= QUESTIONS["question3"]; ?></h2>
                            </div>
                            <div class="ranking-star">

                                <fieldset class="rating rating-left">
                                    <input type="radio" id="star15" name="rating3" value="5" /><label for="star15" class="margin-right-none"><span class="great">GREAT</span></label>
                                    <input type="radio" id="star14" name="rating3" value="4" /><label for="star14" ></label>
                                    <input type="radio" id="star13" name="rating3" value="3" /><label for="star13" ></label>
                                    <input type="radio" id="star12" name="rating3" value="2" /><label for="star12" ></label>
                                    <input type="radio" id="star11" name="rating3" value="1" /><label for="star11"><span class="nogreat">NOT GREAT</span></label>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="box-img img3">
                        <img src="img/accountant.png" alt="">
                    </div>
                </div>

                <div class="bloque-4 relative flex  flex-reverse justify-center">
                    <div class="box-question">
                        <div class="box-content">                           
                            <div class="question">
                                <h2><?= QUESTIONS["question4"]; ?></h2>
                            </div>
                            <div class="ranking-star">

                                <fieldset class="rating rating-right">
                                    <input type="radio" id="star20" name="rating4" value="5" /><label for="star20" class = "margin-right-none" ><span class="great">GREAT</span></label>
                                    <input type="radio" id="star19" name="rating4" value="4" /><label for="star19" ></label>
                                    <input type="radio" id="star18" name="rating4" value="3" /><label for="star18" ></label>
                                    <input type="radio" id="star17" name="rating4" value="2" /><label for="star17" ></label>
                                    <input type="radio" id="star16" name="rating4" value="1" /><label for="star16"><span class="nogreat">NOT GREAT</span></label>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="box-img img4">
                        <img src="img/man-woman.png" alt="">
                    </div>
                </div>


                <div class="bloque-5 flex justify-center">
                    <div class="box-question flex flex-column justify-center">
                        <div class="question">
                            <h2><?= QUESTIONS["question5"]; ?></h2>
                        </div>
                        <div class="radio">
                            <label for="Absolutely">
                                <input type="radio" value="Absolutely" name="quality" id="Absolutely"> <span>Absolutely</span>
                            </label>
                            <label for="NotAbsolutely">
                                <input type="radio" value="NotAbsolutely" name="quality" id="NotAbsolutely"> <span>Unfortunately Not</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="bloque-6 flex justify-center">
                    <div class="box-question flex flex-column justify-center">
                        <div class="question">
                            <h2><?= QUESTIONS["question6"]; ?></h2>
                        </div>
                        <div class="box-textarea">
                            <textarea id="txthere" name="texthere" placeholder="Type here"></textarea>
                        </div>
                    </div>
                </div>

                <div class="bloque-submit">
                    <button type="submit" id="sendSurvey">Submit</button>
                </div>
            </form>
        </div>

        <footer class="footer-survey">
            <span>&#169; 2108 Web design by CU Creative CO.</span>
        </footer>
    </div>

    <script src="js/survey.js"></script>
</body>
</html>