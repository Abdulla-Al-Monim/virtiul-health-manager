@extends('backend.admin.layout.template')
@section('dashboard-content')
<style type="text/css">
	*{

}

.head{
	background: #4F81BC;
	padding: 10px 0px;
}
.head h2{
	color: #ffff;
	font-weight: 700;
	font-size: 24px;
	margin: 0px!important;
	margin: 10px 0px!important;
}
.head p{
	color: #ffff;
	font-weight: 300;
	font-size: 14px;
	margin: 0px!important;

}
.m{
	margin-top: 50px;
	border-top: 2px solid #C7D1DA;
	border-bottom: 2px solid #C7D1DA;
	padding:10px 0px;
}
.content-1 h2{
	color: #8BA6C5;
	font-weight: 700;
	font-size: 24px;
	margin: 0px!important;
	margin: 10px 0px!important;
}
.content-1 p{
	font-weight: 400;
	font-size: 14px;
	margin: 0px!important;
}
.content-2 p{
	font-weight: 400;
	font-size: 14px;
	margin: 0px!important;
	text-align: right;
}
.content-3{
	margin-top: 50px;
}
.content-3 p{
	font-weight: 400;
	font-size: 14px;
	margin: 0px!important;
	padding: 3px 0px;
}
.content-4{
	margin-top: 30px;
}
.content-4 p{

	font-weight: 400;
	font-size: 14px;
	margin: 0px!important;
	padding: 3px 0px;
}
.section{
	margin-top: 40px;
}
.section span,p{
	font-weight: 400;
	font-size: 14px;
	margin: 0px!important;

}
.section span{
	padding-right: 10px;
}
.pdf ul{
	list-style: none;
}
.pdf ul li{
	display: inline-block;
	
	color: black;
	font-size: 50px;
	padding-left: 20px;
}
.pdf ul li .fa-file-pdf-o{
	color: #2B5A9E;
	}
.pdf ul li .fa-file-word-o{
	color: #FE9501;
	
	
}
.pdf ul li .fa-print{
	color: #CBE1F9;
	
	
}
footer{
	background: #4F81BC;
	padding: 20px 0px;
}
footer ul{
	list-style: none;
}
footer ul li{
	display: inline-block;
	padding-left: 5px;
	color: #fff;
}
.mp ul {
	text-align: right;
}
</style>
<div class="content-wrapper" style="min-height: 1416.81px;">
	<section class="content-header">
      <div class="container-fluid">
		<section class="head">
	      	<div class="container">
	        	<div class="row">
	          		<div class="col-md-6">
			            <h2>Virtual Health</h2>
			            <p>Basundhara R/A,Blog G</p>
			            <p>hospital@gmail.com</p>
	          		</div>
	          		<div class="col-md-6" style="text-align: right;">
	            			<img src="image/fevicon.png">
	          			</div>
	        		</div>
	      		</div>
	    	</section>
	    	<section class="banner">
		      <div class="container m">
		        <div class="row">
		          <div class="col-md-6">
		            <div class="content-1">
		              <h2>Dr. Ashey D. Stone,M.D</h2>
		              <p>[Medical physician]</p>
		              <p>+88 01723-030645</p>
		            </div>
		           
		          </div>
		          <div class="col-md-6">
		              <div class="content-2">
		              <p>Prescription no.:  [34342]</p>
		              <p>Date :  05/24/2020</p>
		            </div>
		           </div>
		        </div>
		      </div>
		    </section>
		    <section>
		      <div class="container">
		        <div class="row">
		          <div class="col-md-12">
		            <div class="content-3">
		              <p>INSART MEDICINE NAME],500 mg;5 tabets, After meals </p>
		            <p>ibuproren,600 mg,5 tabets, After meals </p>
		            <p>INSART MEDICINE NAME,500 mg;5 tabets, After meals </p>
		            <p>Noproxen sodium,500mg; Once a Day</p>
		            </div>


		          </div>
		          <div class="col-md-12">
		            <div class="content-4">
		              <p>INSART MEDICINE NAME,500 mg;5 tabets, After meals </p>
		            <p>ibuproren,600 mg,5 tabets, After meals </p>
		            <p>INSART MEDICINE NAME],500 mg;5 tabets, After meals </p>
		            <p>Noproxen sodium,500mg; Once a Day</p>
		            </div>


		          </div>
		        </div>
		      </div>
		    </section>
		    <div class="section">
		      <div class="container">
		        <div class="row">
		          <div class="col-md-6">
		            <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Mr./Ms/Mrs :</th>
					      <td>Jeffrey S.Brown</td>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">Age :</th>
					      <td>22</td>
					    </tr>
					    <tr>
					      <th scope="row">Addresa :</th>
					      <td>Bashudhara R/A</td>

					    </tr>
					    <tr>
					      <th scope="row">Contact Num :</th>
					      <td>01779251787</td>
					    </tr>
					  </tbody>
					</table>
		            
		          </div>
		        </div>
		      </div>
		    </div>
		    <section class="pdf">
		      <div class="container">
		        <div class="row">
		          <div class="col-md-6">
		            <ul>
		              <li><i class="fa fa-file-pdf-o"></i></li>
		              <li><i class="fa fa-file-word-o"></i></li>
		              <li><i class="fa fa-print"></i></li>
		            </ul>
		          </div>
		        </div>
		      </div>
		    </section>
		</div>
	</section>

		
</div>
@endsection
