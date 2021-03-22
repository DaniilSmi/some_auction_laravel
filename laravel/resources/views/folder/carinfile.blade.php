@extends('base')

@section('title', $car->title)

@section('content')
		<div id="MyModal">
			<div class="container">
				<p class="image-text-modal">Current image: <span id="current-image-show"></span> of <span id="all-image-show"></span></p>
			<span id="closeModal" style="cursor: pointer;">&times;</span>
			<img class="modal-content">
			<span id="modalPrevImage"><</span>
			<span id="modalNextImage">></span>
			<span style="visibility: hidden;" id="idIgmModal"></span>
			
			</div>
		</div>

		<div class="car-block-infile">
			<div class="container">
				<div class="car-in-infile">
					<div class="block-title-car-infile d-i"><span>{{$car->title}}</span></div> <button id="watch-later-button" class="d-i"><img src="{{ asset('images/452327.svg') }}"></button>
					<div class="block-images-car-infile">
						<img id="main-image-car-infile" src="{{ asset('images/ferrari.jpg') }}" class="image-modal d-i">
						<div class="images-other d-i">
							<div class="images-other-content">
								<div class="get-dark-infile-image">
									<span>81 images</span>
								</div>
								<img class="another-image-car-infile image-modal" src="{{ asset('images/mbw.jpg') }}">
								<img class="another-image-car-infile image-modal" src="{{ asset('images/mbw.jpg') }}">
								<img class="another-image-car-infile image-modal" src="{{ asset('images/mbw.jpg') }}">
							</div>
						</div>
					</div>

					<div class="block-car-info">


						<div class="block-car-info-left">
							<a href="javascript://" class="none-effect-a" onclick="toBidder()"><div class="most-important-info">
								<img src="{{ asset('images/time-left.svg') }}" id="time-for-end"><p class="time-left-p">Time left: <span></span></p><p class="high-bid-p"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAkCAYAAACaJFpUAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAADCSURBVHgB7dfZDYMwDAZgg9iTbtJ0kqaTwSR1bWEkhHK4uZ78S1Eu5C/wgACgIIj4oLbCiBD0xiNfak/omQuG3dEA1g9NYO3RALZFxvVoAHPSYvNyNITJ+h2EajSGhUBZK0dTWAwsRnNYCvwb1WA5UI1qMQ2YRfF4EaswLZhA1/l23WuaJgcNQnW4c1zzur7QhufT8KFo/IGGYVSewn7WX2TDQ6fInfpzPsPgGGiggQYaaKCBZeAuPX+XbDAiWPHL/QM5onWw0iwKbQAAAABJRU5ErkJggg==" id="high-bid-p-image">High bid: <span>{{$car->high_bid}}</span><span>$</span></p><p class="high-bid-p"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAEySURBVHgB7ZjhCcJADIVz4gB1g26gG+gmdoRuoG7gBuImOoE4QbtBdYLzUnoQBGtyJIdgP2jJj3fnswm5tAAJeO+rcG2t9ClmIl9/RKqfgZwViRfa+hRDSxI32voUQwWJnwZ6GaEOOlIThbZeaqYgm3faekSaMlqgrYFebIg+8oeBXmyoJPHdQA9zvGHzelv8iTWJl2HdXlHfOOfObjBzgt+gSulDpji8CVK2I/FBWd+nDLjk6EGIJGXmPQiRGDLvQYjEUElikx6EpBpqDfQ9EkOmc1AktYb+Zw6SnGV00zqsAWX9dJax4J5lOEZshvgSriuMI9Uj/LMsGD6SAq219RRuyrL0IIRraHoXG9s8yxwU4aQsyxwU4RjKMgdFOIZKEpvNQRGOIfovbwZ6OT7jJ7wX175fooavb3MAAAAASUVORK5CYII=" id="high-bid-p-image">Bids: <span>{{$car->bids}}</span></p><p class="high-bid-p"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAIuSURBVHgBzVjRccIwDFV6/JdOQDaAEbJB2aDZADaATlA2ACZoN0g6QdoJEiZINnCliyBCxMRAnOu700Vny/azZMuOA3gAxpgQPxHKM8oLF5coB5QiCIIf8A0kEaFsUErTjRxly8S9EEnM/di6EAsciIzxs0JZtlRXKCnUIaq4jOynKDPWNdYYyne4BzQjlEzNtOTZRg7tyau7Fm998kRvJpOrjhJzx3qw9JU5kyLDlg6W8CCwj7WeoGtD7eYYekILqWVXg/imBv2QCq8Z58JwC55gzlNIYjOS3smNj4TWjDVTXoqgg/UaPEONt9GVoXNc+yMUifFKXTnvjKkfUvJMDJ9E3UzovzAcUqFHklAodP/XhgYHoY8loYnQCxgOldDPCP0LSELSdSEMB3nAVpJQZTHyjanQc0lILuRXGA5ydzdRUomRcoN3L6nEmFPZyUN4rSygyQlEJgb/iIWeXtSa82tBBh7RclRFVK63fSH0CvxiLfQUI5ReWKjT9w08AftedB7kQ532NFE1zsZmGPs+7VvI5NeME1/hMvVfzIcmY41CV7i4wwWTznimnXmK263M5TuAlcyIv5EooxVf8IDkqbmqJ+x4wBQ/31BnedqVYxbKvtOWdoQ9yhLHsO9iFa7EPPaoYENuHH6/28JlQ2LqsNHiz4w7EpQ5OGLE7j26WyNF+SI3KxfvTPNYRe0n3L5ioUOSwpheDY3FQ7HFE0NeQU4IjqSgfpbb3zyjnvEHMppEwRKkfjEAAAAASUVORK5CYII=" id="high-bid-p-image">Comments: <span>{{$car->comments}}</span></p>
							</div></a>
							<div class="end-auction"><span href="#">Ending {{$car->time_to_end}}</span></div>
							<table>
								<tr><td class="subtop1 grey-column left-top-border">Make</td><td class="subtop2">{{$car->make}}</td><td class="subtop3 grey-column top-top">Engine</td><td class="subtop4 right-top-border">{{$car->engine}}</td></tr>
								<tr><td class="subtop1 grey-column">Model</td><td class="subtop2">{{$car->model}}</td><td class="subtop3 grey-column">Drivetrain</td><td class="subtop4">{{$car->drivetrain}}</td></tr>
								<tr><td class="subtop1 grey-column">Seller</td><td class="subtop2"><div class="content-table"><img class="seller-image" src="{{ asset('images/ferrari.jpg') }}"><a href="#" class="table-a">Seller</a></div></td><td class="subtop3 grey-column">Transmission</td><td class="subtop4">{{$car->transmission}}</td></tr>
								<tr><td class="subtop1 grey-column">Location</td><td class="subtop2">{{$car->location}}</td><td class="subtop3 grey-column">Exterior Color</td><td class="subtop4">{{$car->color1}}</td></tr>
								<tr><td class="subtop1 grey-column">VIN</td><td class="subtop2">{{$car->vin}}</td><td class="subtop3 grey-column">Interior Color</td><td class="subtop4">{{$car->color2}}</td></tr>
								<tr><td class="subtop1 grey-column">Mileage</td><td class="subtop2">{{$car->milage}}</td><td class="subtop3 grey-column">Title Status</td><td class="subtop4">{{$car->title_status}}</td></tr>
								<tr><td class="subtop1 grey-column bt-bt left-bottom-border">Body Style</td><td class="subtop2 bt-bt">{{$car->body_style}}</td><td class="subtop3 bt-bt grey-column">Seller Type</td><td class="subtop4 bt-bt right-bottom-border">{{$car->seller_type}}</td></tr>
							</table>
							<div class="lists">
								<!--<h2>Settings</h2>
								<ul>
									<li>Some text</li>
								</ul>
								<hr class="hr-infile">
								<h2>Settings</h2>
								<ul>
									<li>Some text</li>
								</ul>
								<hr class="hr-infile">
								<h2>Settings</h2>
								<ul>
									<li>Some text</li>
								</ul>
								<hr class="hr-infile">
								<h2>Settings</h2>
								<ul>
									<li>Some text</li>
								</ul>-->

								{!! $car->information !!}
								
							</div>
							<hr class="hr-infile">
							<div class="bid-block">
								<h3>2002 Audi TT Roadster · No reserve</h3>
								<div class="bidder-block">
									<div class="first-line"><div class=" content-table-sell"><span>Current bid</span><img class="seller-image seller-image-sell" src="{{ asset('images/ferrari.jpg') }}"><a href="#" class="table-a table-a-sell">Seller</a></div><div class=" content-table-sell content-2-table"><span>Seller</span><img class="seller-image seller-image-sell" src="{{ asset('images/ferrari.jpg') }}"><a href="#" class="table-a table-a-sell">Seller</a> <a href="javascript://" class="table-a table-a-sell contact-table-a">Contact</a></div></div>
									<div class="first-line second-line"><div class=" content-table-sell"><span class="bid-money">${{$car->high_bid}}</span></div><div class=" content-table-sell content-2-table"><span>Ending</span><img class="seller-image seller-image-sell no-border" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAgCAYAAAABtRhCAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAFXSURBVHgB7VZLToRAEK0mM4TleIPWBWFF1BNwBJfsvIJ6AMMN5gYaT6CeQG6gYUVYKEt2zpKQQPsKYcJiBGKgFxNeQuhPUa+7uop+RJoh+iZt2/7id5IkpzQA13VFnuefaCrYn/1ltxrwI2kkiqJo7VWfnUGaUYfUcRxZluWjEOIc3Q1Nj2dE4C4FBJNVVfU+E1EX3yC9XIFs25A9YeAGi9i1Fkia+jyQBGLIGxYu4Kui36Spj8rzPMqyjDcUoHu9Xq8feOKKJ0EWdMmmQBiG5Pt+Ct+33Ocj2ycNx/fAN2nzDMI0zYP2QRCQZVntRja9ZTGm/lpEUcThH7TXXhbHTyja1NcEpX2H+ywdU9z/ReensGTpQrgQLoQL4USEtd6QUs4iE1m5UUfBG0qpD25Awm1BKmlCsICCNjvBRXHfDL1qF8JGHMepYRgXGHihebBDFN+YjKXoD0mPlDwmENGdAAAAAElFTkSuQmCC"><span id="data-date"><!--Monday, Feb 8 10:50pm--> {{$car->time_to_end}}</span></div></div>
									<div class="first-line third-line"><div class=" content-table-sell d-d-datre"><span>Bids</span><img class="seller-image seller-image-sell no-border" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAFtSURBVHgBxZZNboMwEIXtkgXL9Aa0SIgVReIi7Y24UXsEbtB0h1i0nKBNQUKIP3cGOVVVEWai2MmTjPn55IcNj0GIK0meAgdB8IF9URR3FBtFkWzb9h12FfD3/6/fCKY8z9tiB21LsWmaiqqqVnm2seu6MfZKqR3FZllG8mzjvu/nO5dSflNsXdckzzZ2HCfWu+SMx3FE/kEfvolzjEHzQDCDVwqcpklqXh3j2cbwrOalg9mQSz0MA8mzjeHOYz0oudQcfs6xzqcnLqhTnvHl5fv+I6yKgvZCsUmSIP+k+edjHGvGpqPENhaGo8Q2Nh0ltrHpKLGMdVXCti/Lcr/GYlVqmobFk8amqxLb2HRVYhvbiBJqgxv8Tem6bhGAeByitAvD8PdXKc9ztcCyojSPh5trfKs3ule6LUn+YZbOmxdGSX9zvygWowT8reY/KX715bIVJdLYVpRIY1tRIo2FharEMrZRlVjGNqrSQT9rM/T5c14L/wAAAABJRU5ErkJggg=="><span id="data-date">{{$car->bids}}</span></div></div>
								</div>
								<div class="bidder-2-block"><div class="the-last-line-infile">
									<button id="place-bid">Place Bid</button>
									<div class="some-href-in-bidder-block"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAfCAYAAACGVs+MAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAANlSURBVHgBrVe7ctpAFF0J/Kg8xI8ej59d7C+wKFOZfAF2mSrwBUCVdIYvMHxB4Assl6mg5DWgMgVDlC7AADlHXmUUsgK09p2Rdlnt3se5r8UQmpRMJhM7OzuZxWLhTiaTuuM4rtCguNCk7e3tRwhPc761tWVjSAkNMoQGXV5eJufz+QBT3+oEUHing4IpNGg2m1kcgUANQ51zuONOaJCWAqAMX4Zh2FDC5hyI3AoNiuyCAPyCsHNEPPC3lhsiI+DDD/Iinw9QaHJBxw06LsjI8VtgrcqXjhsiKUD44XeLc+a+vz6dThmMLr+xPogIFEmBQPTbQV+/xg1eITo/P2dBudpgvx/9leUPpmnWoYQFN2TAbxMUBp1Op2qcnZ09gGFWRCDAfwyrneAaoUc2/BTRqEgELM4IKxR53uDQYFk4iW64uLjIgc9a67HnRsbSbRwTBtOVXLABS1FoUrvdLq3bIxG3pCLPXiGCzwoY8nKxiaj+qLLyNcQMQhA/BoSXu91u1ghoRhSY20k8Dp4Cg0S8AcFABi/RoXscBOp9r9ez+S3mbxqNRj+Ojo4YySyvFp70/v5+Ym9v77vrur+FBjEwwfMLDPuKn7t4agjgD/1+v+XvUfaC09PTLNLqQf50cCgV1SVLiLJIFVUxEtqMZNN5kgyY+7lNgkwKv8N+GpBYZ0BoJWy1Wg5i4NivcFEI6FFwgmkN4der0FtbisEkyXE8HtfEhoQz3l4o/37d3pUKnJycsETTmmaUGCB68qKSiMfjV9oKxGIx79IJi5TpyDghqb75VRVjWugqALrhSwU/cxtB2kD9b8g8/5exaVakAplVAlZlgSWzoIlgvPbXmdu4hueXGxggL6GCFoNtGorxqsZsSvmF5z9FRQjh0J1k/LdBMbdpsRTO3M5hX07Os/y25BLPdavcsMoFN3Ks8IVO9xmMGrSIqcn0Yl2AZSXATYQcfuMFFZbnpRG2VCDUDUoXBOB3wDy13EQAdUF1+w02NfFSdnNQyCtmYW5QIoDNlhTGxvEkhbtkwg4WdvVGrBRw5l68oJGmcP539ASZpqU6o1SAgjlKwYTcJuRhgRQkKFgharIO8BLr14GBan9MtYjO2Dw4ODDAhJqXYdkndMSN/3AMh0MXPKqHh4e/wGOXdQQ8yqq9fwAbefKZzPjNzgAAAABJRU5ErkJggg==" class="image-bidder-block-2"><a href="" class="a-bidder-block-2 table-a table-a-sell">Watch this auction</a></div>
									<div class="some-href-in-bidder-block"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAANeSURBVHgBzVe7UttAFF2tDUPFOA2TUhQwdNhdOpsyVaBLB/kCyBdgvgDzBYEqJeYLMF06nM7jx0RlKo9Kj585Z7nrKIotrZRMJmfGo7V033sfu55yhO/7pY2NjWMsq/iVPc/z8SzJ53CxWAR4tvG+NR6PH4IgCF3kemkEBwcH/mw2u4Dg04jCVMCg28lkcgVDApXHAPH4EoovIkJbWuvmfD5/gvDAeknaYrFYLhQKh/h2DJ5ahKfR6/U+ZjKAXkPQI2Vn8SbGX8fyVF4F2JajVfy/GbC3t8f9vRflAZSfwIO2yoGYIytl6ThDRPkdrK7kVU50Oh16XsGySZmUje3yozTLCHAfNzc3n0V5s9vtnqi/iP39/Vv1siXGKJs/RUvAhBPlJPiwTpAYeo7lmdATDG8rKU8g8wJ8LGFfdJnENBGQvfomhLvrhMSixOQ024PQlq0h65KNkPx6juoxOSAZa7I9KdOhvKF+RmkX+cEcqaA0d/ku4t1KSD7dcQ06U96aXikpF4ZQJaMq1v/iJZMNzeolpJ53nCQAxtaF7pS6tbRX02Qc6pzWr9xnCLbvErsljaUu0lF30XYtCHhQKUBl1BM+2zxILVvqghE1LKsai0O+RAhz1zuSuAZHruVvI40eOdfik8mrZaqp6XSaywBk9rV0O4b+ClG6S+PhHJGlr4VRuY7PuHIZVgGMOErZoiUiukpFlRMMO5RSeZhU+2lgBJYjNQsjcsaX5VNW5RFdoZaTDBuDrzIA3vMU1MIWPKqM2NraWnZOluFXLMoojZpyKCGLwWDACddUOQDDy/Jsa2kK9Oid+kewunh+9GTAcBCVkgZRHBiv7Pl1FRuvaYgNvleajIiCHRCXyhHgsT3ft+3cBbHBF5ppiMOk6V4IyRlHposgazQQorG0XHjovYoNPmOADIgbMeLepST7/X4DPBXXbaNM6Zg0/sbyFCzB9vb2F0TiPWlREa+Hw2HqcALN9zAMR8oBOzs7n/F4g1+Ac8Fb+355KDX7ofURl9wKJNl91ua0CpQBWZ+wZJ6YE1P0e+qx/E/arMsR//+7mFjI1awOD87tO3s1Y/ccjUbt6NWMrRzfqiuuZjcwvr6uTzhdTmPeuMD0Fihu5L6cxmGv5/SOp6h113P8eHFtunbGH6TWXD3HX3VoAAAAAElFTkSuQmCC" class="image-bidder-block-2"><a href="#" class="a-bidder-block-2 table-a table-a-sell">How buying works</a></div>
									<div class="some-href-in-bidder-block"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAgCAYAAAB3j6rJAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAKWSURBVHgB7VdLchoxEJUgUFlSxQEiiu/O+AbjE8ScIOYE9g2AZVbhBsQ34AbGJ8hkR/Gp6AJUyI7im9cTyRm7GE+3y5+NXxXVGqktPXW3uttKveM+tES50WiY/X5/g6FJUbXr9frUWrtUTGSUACDRZZAgmFwu11ECsC1SrVYvtNYDGuO2JdzWHtNzVvuBYQHybDabjRQDLIvQ5iDhb9hLIkEYj8cWBHrR5pnMwBhTUAzo2GHBbrczR5W0/gxxjp+dTCYlxQAseIO/Cw6Hw3d83h7TyWazFsRH0RmCAHzUJQ8Rd1GKKgX2mY4xDzEZJmlj/Zrrb49KpRJg7y9J63QuhMHeI12r1Q40Kbntc4HiJ5/P/45IeSLwvTSnkBVPYP6mm/oDnw+9z7nw539QQpDvEdQDEAjoG+a9W8PcJTaOfC61roiID2wcbvC5pLhR/+Oq6V6Xgbl/lcvl1nw+H3L3FhHxr4sCe7PZtI7c+goW6UJ24CbKISHXMuwUT5lV/XviFiQSTY9Y60KQJSgQvykmJLXm0sluWjFDjLTdMOBmVjYR+D96HbjxdZouEXV5qYDiZxQD7Frjz1BMgPhPN2xy9FlEVquVdwXLzARY5JOTlqPPIuJiwhIRSttp+q5aR3rb7TZUDEiCNYqNWDuQCCS8KLCp8nK7NDYRvIQ+hKWb4ikn9hnIIx3oXNEYz7zH3Z+d0OhmINDCIZRZL5Ajgnq93vdB6eoO9SyB+25L0rwos06n0xD+P41l2D5+d+uu7lCH1pa2DOKiR60gRAm15BytYIDxiVui+Vu4Yyjp3p9MxMMVNHZRS4Po34mXBBGJzMjJD88Naq7ccKl92VZvi152sViMisUihTvVhI/qdUHe+Opah3fcw18mBFO+/pDFiAAAAABJRU5ErkJggg==" class="image-bidder-block-2"><a href="#" class="a-bidder-block-2 table-a table-a-sell">Photo gallery</a></div>
								</div></div>
							</div>

							<hr class="hr-infile">

							<div class="comment-block">
								<h3>Comments & Bids</h3>
								<form id="comments-form-infile" disabled method="POST" action="/create-comment">
									{{csrf_field()}}
									<input type="hidden" value="" id="id_com_reply" style="display: none;" name="id_com_reply">
									<input type="hidden" value="{{$car->id}}" id="id_com_car" style="display: none;" name="id_com_car">
									<div class="reply_comments" style="display: none;"><div  id="reply_text" >Re: <span></span></div><button id="close_reply" type="button">X</button></div>
									<textarea style="" id="ajax-textarea-infile-comments" placeholder="Add a comment..." name='comm_text_area'></textarea><br>
									<div class="button-block"><button type="submit" id="ajax-submit-infile-comments" class="disabled" name="submit-comment"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAEZSURBVHgB7ZUxDoIwFIb7HsToYKyri028gIvGUW/gDdSbeBO5iauJixcw4uJqR2O01TYgSgq04MifGFPC/328QIEQh1A2pO8fc+mA7YkKLLFx0iVx7/LwwG16SCzz8H2WrPyhbc9aUDa1oBb8SVBmh+blm4fRDr2qXdoejBekYtqDySLmKZGa4LPlUZKgikTBUYogOdKkqN4pIOSqqiQNB8AVD3ehvgc83AdVJEb4cafXn6eorCQP/iMoIymC62OmImWjpUTYxGsBZClBnD2BW10SYvb0/H4RXMUzCW78cmh1eud3ax5dxRwkqn/9HZCgR18XwaNudtKTGAE58MwJ4qQncYUXCvIkNnArgUliC3cOZRNG2ZS6dF7zxph4nzhaGAAAAABJRU5ErkJggg=="></button></div>
								</form>

								<div class="comments-container-infile">

									<div class="slider slider-infile">
						<div class="slider-titles slider-titles-comments"><a href="javascript://" class="slider-titles-hrefs slider_titles_href_comments" onclick="anotherPage(0)">Newest</a><a href="javascript://" class="slider-titles-hrefs slider_titles_href_comments" onclick="anotherPage(1)">Most Upvoted</a><a href="javascript://" class="slider-titles-hrefs slider_titles_href_comments" onclick="anotherPage(2)">Seller Comments</a><a href="javascript://" class="slider-titles-hrefs slider_titles_href_comments" onclick="anotherPage(3)">Bid History</a></div>
						<div class="sliderss">
							<div class="slider-content">
								<div class="slide">
									<div class="comment-in-infile">
										<div class="comment-header"><img class="seller-image" src="{{ asset('images/ferrari.jpg') }}"><a href="#" class="seller-name-comment table-a">Seller</a><svg class="verified" width="17" height="17" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="v-rkJj5dkREliotJamesv"><title id="v-rkJj5dkREliotJamesv">Registered Bidder</title><path d="M6.166 1.286c.952-1.715 3.418-1.715 4.37 0l.425.764.84-.24c1.886-.54 3.63 1.205 3.091 3.09l-.24.841.764.425c1.715.952 1.715 3.418 0 4.37l-.764.425.24.84c.54 1.886-1.205 3.63-3.09 3.091l-.841-.24-.424.764c-.953 1.715-3.419 1.715-4.371 0l-.425-.764-.84.24c-1.886.54-3.63-1.205-3.091-3.09l.24-.841-.764-.424c-1.715-.953-1.715-3.419 0-4.371l.764-.425-.24-.84C1.27 3.015 3.015 1.27 4.9 1.81l.841.24.425-.764z" fill="#0c4370"></path><path d="M11.5 6.351l-3.625 4.5L6 9.033" stroke="#0F2236" stroke-linecap="round" stroke-linejoin="round"></path></svg><div class="seller"><span>Seller</span></div><span id="time-for-comment">Yesterday</span></div>
										<div class="comment-text"><p>Some text here</p></div>
										<div class="buttons-comment"><button type="button" class="button-upvote"><svg class="reputation" width="8" height="10" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="ir-3Olq5AYYuv"><title id="ir-3Olq5AYYuv">Reputation Icon</title><path d="M4 1v8M1 4l3-3 3 3" stroke="#828282" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path></svg> 0</button>
											<button class="reply-button-comment" onclick="showReply('some_person', 45);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAEYSURBVHgB7ZbfjYJAEMZnJ/DGgyVsCWcHdx0cFZxXiViBJaDPhBArsATtQDqQAvjjN8lCfGFFdo0vfsmwOzCZ3+4wbCCCiqJYwDS9QCyJ27a9wi5pmi7Is7iua907URR9kWcxvVgfwPsBAc2Uae8tM5/jON6Mxc3eAdp7heEXkASwtXdAEAQ7DKXMbRBGYDU4zJomCmUpEf/zCMImoIf80ROaAmEEVV3X7Y3/bavnHIiSi5ymeHDCVJv7JaAHWDUVpJTSsKECgCbSXaq/YdrueAdxVtM0y6GLzFaXmP5j5WdyVxmGYaXIk/I8l7onfXJ5L7JoL4Cx5OI4A2zJnQGPkjsBkHyFIbUlF/k4rkeTOyvLMvnyrX8iN055my2av4UmAAAAAElFTkSuQmCC"></button>
										</div>
									</div>
									
									<div class="comment-in-infile">
										<div class="comment-header"><img class="seller-image" src="{{ asset('images/ferrari.jpg') }}"><a href="#" class="seller-name-comment table-a">Seller</a><svg class="verified" width="17" height="17" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="v-rkJj5dkREliotJamesv"><title id="v-rkJj5dkREliotJamesv">Registered Bidder</title><path d="M6.166 1.286c.952-1.715 3.418-1.715 4.37 0l.425.764.84-.24c1.886-.54 3.63 1.205 3.091 3.09l-.24.841.764.425c1.715.952 1.715 3.418 0 4.37l-.764.425.24.84c.54 1.886-1.205 3.63-3.09 3.091l-.841-.24-.424.764c-.953 1.715-3.419 1.715-4.371 0l-.425-.764-.84.24c-1.886.54-3.63-1.205-3.091-3.09l.24-.841-.764-.424c-1.715-.953-1.715-3.419 0-4.371l.764-.425-.24-.84C1.27 3.015 3.015 1.27 4.9 1.81l.841.24.425-.764z" fill="#0c4370"></path><path d="M11.5 6.351l-3.625 4.5L6 9.033" stroke="#0F2236" stroke-linecap="round" stroke-linejoin="round"></path></svg><div class="seller"><span>Seller</span></div><span id="time-for-comment">Yesterday</span></div>
										<div class="comment-text"><p>Some text here</p></div>
										<div class="buttons-comment"><button type="button" class="button-upvote"><svg class="reputation" width="8" height="10" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="ir-3Olq5AYYuv"><title id="ir-3Olq5AYYuv">Reputation Icon</title><path d="M4 1v8M1 4l3-3 3 3" stroke="#828282" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path></svg> 0</button>
											<button class="reply-button-comment" onclick="showReply('some_person', 45);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAEYSURBVHgB7ZbfjYJAEMZnJ/DGgyVsCWcHdx0cFZxXiViBJaDPhBArsATtQDqQAvjjN8lCfGFFdo0vfsmwOzCZ3+4wbCCCiqJYwDS9QCyJ27a9wi5pmi7Is7iua907URR9kWcxvVgfwPsBAc2Uae8tM5/jON6Mxc3eAdp7heEXkASwtXdAEAQ7DKXMbRBGYDU4zJomCmUpEf/zCMImoIf80ROaAmEEVV3X7Y3/bavnHIiSi5ymeHDCVJv7JaAHWDUVpJTSsKECgCbSXaq/YdrueAdxVtM0y6GLzFaXmP5j5WdyVxmGYaXIk/I8l7onfXJ5L7JoL4Cx5OI4A2zJnQGPkjsBkHyFIbUlF/k4rkeTOyvLMvnyrX8iN055my2av4UmAAAAAElFTkSuQmCC"></button>
										</div>
									</div>
									<div class="comment-in-infile">
										<div class="comment-header"><img class="seller-image" src="{{ asset('images/ferrari.jpg') }}"><a href="#" class="seller-name-comment table-a">Seller</a><svg class="verified" width="17" height="17" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="v-rkJj5dkREliotJamesv"><title id="v-rkJj5dkREliotJamesv">Registered Bidder</title><path d="M6.166 1.286c.952-1.715 3.418-1.715 4.37 0l.425.764.84-.24c1.886-.54 3.63 1.205 3.091 3.09l-.24.841.764.425c1.715.952 1.715 3.418 0 4.37l-.764.425.24.84c.54 1.886-1.205 3.63-3.09 3.091l-.841-.24-.424.764c-.953 1.715-3.419 1.715-4.371 0l-.425-.764-.84.24c-1.886.54-3.63-1.205-3.091-3.09l.24-.841-.764-.424c-1.715-.953-1.715-3.419 0-4.371l.764-.425-.24-.84C1.27 3.015 3.015 1.27 4.9 1.81l.841.24.425-.764z" fill="#0c4370"></path><path d="M11.5 6.351l-3.625 4.5L6 9.033" stroke="#0F2236" stroke-linecap="round" stroke-linejoin="round"></path></svg><div class="seller"><span>Seller</span></div><span id="time-for-comment">Yesterday</span></div>
										<div class="comment-text"><p>Some text here</p></div>
										<div class="buttons-comment"><button type="button" class="button-upvote"><svg class="reputation" width="8" height="10" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="ir-3Olq5AYYuv"><title id="ir-3Olq5AYYuv">Reputation Icon</title><path d="M4 1v8M1 4l3-3 3 3" stroke="#828282" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path></svg> 0</button>
											<button class="reply-button-comment" onclick="showReply('lada_racing', 7878);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAEYSURBVHgB7ZbfjYJAEMZnJ/DGgyVsCWcHdx0cFZxXiViBJaDPhBArsATtQDqQAvjjN8lCfGFFdo0vfsmwOzCZ3+4wbCCCiqJYwDS9QCyJ27a9wi5pmi7Is7iua907URR9kWcxvVgfwPsBAc2Uae8tM5/jON6Mxc3eAdp7heEXkASwtXdAEAQ7DKXMbRBGYDU4zJomCmUpEf/zCMImoIf80ROaAmEEVV3X7Y3/bavnHIiSi5ymeHDCVJv7JaAHWDUVpJTSsKECgCbSXaq/YdrueAdxVtM0y6GLzFaXmP5j5WdyVxmGYaXIk/I8l7onfXJ5L7JoL4Cx5OI4A2zJnQGPkjsBkHyFIbUlF/k4rkeTOyvLMvnyrX8iN055my2av4UmAAAAAElFTkSuQmCC"></button>
										</div>
									</div>
								</div>
								<div class="slide">
									
								</div>
								<div class="slide">
									
								</div>
								<div class="slide">
								
								</div>
							</div>
						</div>
					</div>

								</div>
							</div>
						</div>
						<div class="block-car-info-right">
							


					</div>
				</div>
			</div>
		</div>

		<div class="invisible-images" style="display: none;">
			<img class="another-image-car-infile image-modal" src="{{ asset('images/mbw.jpg') }}">
								<img class="another-image-car-infile image-modal" src="{{ asset('images/mbw.jpg') }}">
								<img class="another-image-car-infile image-modal" src="{{ asset('images/mbw.jpg') }}">
								<img class="another-image-car-infile image-modal" src="{{ asset('images/mbw.jpg') }}">
								<img class="another-image-car-infile image-modal" src="{{ asset('images/mbw.jpg') }}">
								<img class="another-image-car-infile image-modal" src="{{ asset('images/mbw.jpg') }}">
								<img class="another-image-car-infile image-modal" src="{{ asset('images/mbw.jpg') }}">
								<img class="another-image-car-infile image-modal" src="{{ asset('images/mbw.jpg') }}">
								<img class="another-image-car-infile image-modal" src="{{ asset('images/mbw.jpg') }}">
		</div>
@stop

@section('javascript')
	<script type="text/javascript" src="{{ asset('js/ajax/infile-ajax.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/scroll-infile.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/input-infile.js') }}"></script>
	<!--<script type="text/javascript" src="{{ asset('js/indexslider.js') }}"></script>-->
	<script type="text/javascript" src="{{ asset('js/modal.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/ajax/counter.js') }}"></script>
	<script>countM({{$car->id}})</script>
@stop