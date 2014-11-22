@section('content')

<div class="splash-container">
	<div class="splash">
		<h1 class="splash-head">{{{ ($user->device_id) }}}</h1>
		<p class="splash-subhead">
			Welcome to Hellgate.
		</p>
		<!-- <p>
			<a href="http://purecss.io" class="pure-button pure-button-primary">Get Started</a>
		</p> -->
	</div>
</div>

<div class="content-wrapper">
	<div class="content">
		<h2 class="content-head is-center">Your karma to remove pasts.</h2>

		<div class="pure-g">
			<div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">

				<h3 class="content-subhead">
					{{{ $user->point }}} points
				</h3>
				<p>
					Know your enemy.
				</p>
			</div>
		</div>
	</div>

	<div class="ribbon l-box-lrg pure-g">
		<h2 class="content-head is-center">Request to remove memories to lose.</h2>

		<div class="pure-g">
			<div class="l-box-lrg pure-u-1 pure-u-md-2-5">
				<form class="pure-form pure-form-stacked">
					<fieldset>

						<label for="name">Name</label>
						<input id="name" type="text" placeholder="Name">

						<label for="sex">Sex</label>
						<select id="sex" name="sex" class="pure-input-1-2">
							<option value="m">남자</option>
							<option value="f">여자</option>
						</select>

						<label for="enter_year">Enter Year</label>
						<input id="enter_year" placeholder="Enter Year">

						<label for="major">Major</label>
						<select id="major" name="major" class="pure-input-1-2">
							<option value="무학과">무학과</option>
							<option value="건설및환경공학과">건설및환경공학과</option>
							<option value="경영공학과">경영공학과</option>
							<option value="기계공학전공">기계공학전공</option>
							<option value="기술경영학과">기술경영학과</option>
							<option value="물리학과">물리학과</option>
							<option value="바이오및뇌공학과">바이오및뇌공학과</option>
							<option value="산업디자인학과">산업디자인학과</option>
							<option value="산업및시스템공학과">산업및시스템공학과</option>
							<option value="생명과학과">생명과학과</option>
							<option value="생명화학공학과">생명화학공학과</option>
							<option value="수리과학과">수리과학과</option>
							<option value="신소재공학과">신소재공학과</option>
							<option value="원자력및양자공학과">원자력및양자공학과</option>
							<option value="웹사이언스공학전공">웹사이언스공학전공</option>
							<option value="인문사회과학과">인문사회과학과</option>
							<option value="전기및전자공학과">전기및전자공학과</option>
							<option value="전산학과">전산학과</option>
							<option value="항공우주공학전공">항공우주공학전공</option>
							<option value="화학과">화학과</option>
						</select>

						<button type="submit" class="pure-button">Sign Up</button>
					</fieldset>
				</form>
			</div>

			<div class="l-box-lrg pure-u-1 pure-u-md-3-5">
			</div>
		</div>
	</div>
</div>
@stop