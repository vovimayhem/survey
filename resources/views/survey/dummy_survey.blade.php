<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="/favicon.png.ico" type="image/x-icon">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Community Tax Survey</title>

	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/starability-all.min.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Basic|Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/rating.css">
</head>
<body>
	<div id="app" class="main-survey" style="position: relative;">
		<div class="content-survey">
			<div class="bloque-1 relative flex justify-center">
				<div class="box-question">

					<div class="box-content">
						<div class="question">
							<h2>@lang('survey.question1')</h2>
						</div>
						<div class="ranking-star">
							<fieldset @change="updatePost1" class="rating rating-left">
								<input type="radio" id="star5" name="rating1" value="5" {{ $result->question1 == 5 ? 'checked' : '' }}  />
								<label for="star5" class="margin-right-none"><span class="great">@lang('survey.great')</span></label>

								<input type="radio" id="star4" name="rating1" value="4" {{ $result->question1 == 4 ? 'checked' : '' }}/>
								<label for="star4" ></label>

								<input type="radio" id="star3" name="rating1" value="3" {{ $result->question1 == 3 ? 'checked' : '' }}/>
								<label for="star3" ></label>

								<input type="radio" id="star2" name="rating1" value="2" {{ $result->question1 == 2 ? 'checked' : '' }}/>
								<label for="star2" ></label>

								<input type="radio" id="star1" name="rating1" value="1" {{ $result->question1 == 1 ? 'checked' : '' }}/>
								<label for="star1"><span class="nogreat">@lang('survey.not_great')</span></label>
							</fieldset>
						</div>
					</div>
				</div>

				<div class="box-img img1">
					<img src="/img/couple-1.png" alt="">
				</div>
			</div>

			<div class="bloque-2 relative flex  flex-reverse justify-center">
				<div class="box-question">
					<div class="box-content">                           
						<div class="question">
							<h2>@lang('survey.question2')</h2>
						</div>
						<div class="ranking-star">

							<fieldset @change="updatePost2" class="rating rating-right">
								<input type="radio" id="star5" name="rating2" value="5" {{ $result->question2 == 5 ? 'checked' : '' }}  />
								<label for="star5" class="margin-right-none"><span class="great">@lang('survey.great')</span></label>

								<input type="radio" id="star4" name="rating2" value="4" {{ $result->question2 == 4 ? 'checked' : '' }}/>
								<label for="star4" ></label>

								<input type="radio" id="star3" name="rating2" value="3" {{ $result->question2 == 3 ? 'checked' : '' }}/>
								<label for="star3" ></label>

								<input type="radio" id="star2" name="rating2" value="2" {{ $result->question2 == 2 ? 'checked' : '' }}/>
								<label for="star2" ></label>

								<input type="radio" id="star1" name="rating2" value="1" {{ $result->question2 == 1 ? 'checked' : '' }}/>
								<label for="star1"><span class="nogreat">@lang('survey.not_great')</span></label>
							</fieldset>
						</div>
					</div>
				</div>

				<div class="box-img img2">
					<img src="/img/Female-Customer-Service-Professional.png" alt="">
				</div>
			</div>

			<div class="bloque-3 relative flex justify-center">
				<div class="box-question">
					<div class="box-content">                           
						<div class="question">
							<h2>@lang('survey.question3')</h2>
						</div>
						<div class="ranking-star">
							<fieldset @change="updatePost3" class="rating rating-left">
								<input type="radio" id="star5" name="rating3" value="5" {{ $result->question3 == 5 ? 'checked' : '' }}  />
								<label for="star5" class="margin-right-none"><span class="great">@lang('survey.great')</span></label>

								<input type="radio" id="star4" name="rating3" value="4" {{ $result->question3 == 4 ? 'checked' : '' }}/>
								<label for="star4" ></label>

								<input type="radio" id="star3" name="rating3" value="3" {{ $result->question3 == 3 ? 'checked' : '' }}/>
								<label for="star3" ></label>

								<input type="radio" id="star2" name="rating3" value="2" {{ $result->question3 == 2 ? 'checked' : '' }}/>
								<label for="star2" ></label>

								<input type="radio" id="star1" name="rating3" value="1" {{ $result->question3 == 1 ? 'checked' : '' }}/>
								<label for="star1"><span class="nogreat">@lang('survey.not_great')</span></label>
							</fieldset>
						</div>
					</div>
				</div>

				<div class="box-img img3">
					<img src="/img/accountant.png" alt="">
				</div>
			</div>

			<div class="bloque-4 relative flex  flex-reverse justify-center">
				<div class="box-question">
					<div class="box-content">                           
						<div class="question">
							<h2>@lang('survey.question4')</h2>
						</div>
						<div class="ranking-star">

							<fieldset @change="updatePost4" class="rating rating-right">
								<input type="radio" id="star5" name="rating4" value="5" {{ $result->question4 == 5 ? 'checked' : '' }}  />
								<label for="star5" class="margin-right-none"><span class="great">@lang('survey.great')</span></label>

								<input type="radio" id="star4" name="rating4" value="4" {{ $result->question4 == 4 ? 'checked' : '' }}/>
								<label for="star4" ></label>

								<input type="radio" id="star3" name="rating4" value="3" {{ $result->question4 == 3 ? 'checked' : '' }}/>
								<label for="star3" ></label>

								<input type="radio" id="star2" name="rating4" value="2" {{ $result->question4 == 2 ? 'checked' : '' }}/>
								<label for="star2" ></label>

								<input type="radio" id="star1" name="rating4" value="1" {{ $result->question4 == 1 ? 'checked' : '' }}/>
								<label for="star1"><span class="nogreat">@lang('survey.not_great')</span></label>
							</fieldset>
						</div>
					</div>
				</div>

				<div class="box-img img4">
					<img src="/img/man-woman.png" alt="">
				</div>
			</div>

			<div class="bloque-5 flex justify-center">
				<div class="box-question flex flex-column justify-center">
					<div class="question">
						<h2>@lang('survey.question5')</h2>
					</div>
					<div @change="isBack" class="radio">
						<label for="Absolutely">
							<input type="radio" value="Absolutely" name="quality" id="Absolutely" {{ $result->question5 == 'True' ? 'checked' : '' }}> <span>@lang('survey.absolutely')</span>
						</label>
						<label for="NotAbsolutely">
							<input  type="radio" value="NotAbsolutely" name="quality" id="NotAbsolutely" {{ $result->question5 == 'False' ? 'checked' : '' }}> <span>@lang('survey.unfortunately_not')</span>
						</label>
					</div>
				</div>
			</div>

			<div class="bloque-6 flex justify-center">
				<div class="box-question flex flex-column justify-center">
					<div class="question">
						<h2>@lang('survey.feedback')</h2>
					</div>
					<div class="box-textarea">
						<textarea @change="feed" id="txthere" name="feedback" placeholder="@lang('survey.type_here')">{{ $result->feedback }}</textarea>
					</div>
				</div>
			</div>

			<div class="bloque-submit">
				<button id="sendSurvey">@lang('survey.submit')</button>
			</div>
		</form>
	</div>

	<footer class="footer-survey">
		<span>&#169; 2019 Community Tax</span>
	</footer>
</div>

<script src="/js/survey.js"></script>
<!-- /.content -->
</body>
</html>