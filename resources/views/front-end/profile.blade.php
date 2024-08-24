@extends("front-end.layouts.main")

<!--
    - MAIN
  -->

@section("main-section")

<style>
    *{
			padding:0;
			margin: 0;
			box-sizing: border-box;
		}
		.profile-container{
             background-color: #fff;
			 min-height: 100vh;
			 font-family: open Sans;
			 display: flex;
			 align-items: center;
			 justify-content: center;
		    }
			.main{
				display: flex;
				
				flex-direction: column;
				border-radius: 15px;
				height: 400px;
				min-width: 370px;
				box-shadow: 0px 0px 20px #cacbcc;
			}
			.profile-photo{
               width: 100%;
			   display: flex;
			   align-items:center;
			   justify-content: center;
			   height:120px ;
			   
			}
			.p-p{
				text-align: center;
				background-color: rgb(26,115,232);
				color: White;
				font-size: 3rem;
				padding: 8px 25px;
				border-radius: 100%;
			}
			.camera{
				font-size: 10px;
				color: #000;
				background-color: #fff;
				box-shadow: 0px 0px 2.5px #2a2b2c;
				width: 29px;
				height: 29px;
				border-radius: 100%;
				display:flex;
				align-items: center;
				justify-content: center;position: absolute;
			
				transform: translate(27px,33px);
				padding-right:5px
			}
			
              .material-symbols-outlined {
           font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 5;
            font-size:16px;
			
			  }
		.camera  .material-symbols-outlined:hover{
				  color:rgb(26,115,232) ;
				  cursor:pointer;
			  }
			  .name{
				  width:100%;
				  padding: 0px 0px 0px 0px;
				  text-align: center;
				  font-weight: 600;
				  opacity: .85;
			  }
             .email{
                  width: 100%;    
				  text-align: center;
				  opacity:.7;
				
              }
			.manage{
				width: 100%;
				text-align: center;
				padding: 22px 0px 22px 0px;
			}
			.manage .manage-span{
				width: 100%;
				border: 1px solid #cacbcc;
				padding: 7px 10px;
				border-radius: 20px;
				font-weight:600;
				letter-spacing: 1px;
				opacity: .85;
				font-size: .9rem;
			}
			.manage .manage-span:hover{
            background-color: #e7e7e7;
			cursor: pointer;
			}

			.add-account{
				width:100%;
				display: flex;
				align-items: center;
				height:50px;
				border-top: 1px solid #cacbcc;
				border-bottom: 1px solid #cacbcc;
				font-size: .85rem;
				font-weight: 700;
				opacity: .85;
				letter-spacing: 1px;
				padding:0px 0px 0px 20px
			}
			.add-account:hover{
				background-color: #e7e7e7;
			cursor: pointer;
			}
            .sign-out{
				width: 100%;
				display: flex;
				align-items: center;
				padding: 20px 0px 20px 0px;
				align-items: center;
				justify-content: center;
				
			}
			.sign-out a:hover{
				background-color: #e7e7e7;
			cursor: pointer;
			}
		.sign-out a{
               padding: 12px 22px;
			   background-color: #fff;
			   color: rgb(41, 40, 40);
			   opacity: .85;
			   font-size: .85rem;
			   border-radius: 5px;
			   font-weight: 600;
			   border: 1px solid #cacbcc;
			   letter-spacing: 1px;
			   
			}
			
			
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48;
  padding:0px 20px 0px 25px 
}

.policy{
	width: 100%;
	display: flex;
	align-items: center;
	flex-direction: row;
	justify-content: center;
}
.policy-item{
	font-size: .79rem;
	opacity: .75;
	padding: 2px 8px ;
	border-radius: 5px;
}
.policy-item:hover{
	background-color: #e7e7e7;
			cursor: pointer;
}

.policy .material-symbols-outlined {
  font-variation-settings:
  'FILL' 100,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48;
  font-size: 6px;
}
</style>

<div class="profile-container">
<div class="main">
    <div class="profile">
        <div class="profile-photo">
            
                <img src="{{$user->image}}" style="border-radius: 50%" alt="">
          
            <span class="camera">
                <span class="material-symbols-outlined">
                    <i class="fa fa-camera"></i>
                </span></span>

        </div>
        <div class="name">{{$user->name}}</div>
        <div class="email">{{$user->email}}</div>
        <div class="manage">
            <span class="manage-span">
                Manage your Google Account
            </span>
        </div>
        <div class="add-account"><span class="material-symbols-outlined">
                person_add
            </span>Add another Account</div>
        <div class="sign-out"><a href="{{route('user.logout')}}">Sign out</a></div>
        <div class="policy">
            <div class="policy-item">Privacy Policy</div>
            <span class="material-symbols-outlined">
                fiber_manual_record
            </span>
            <div class="policy-item">Terms of Service</div>
        </div>

    </div>
</div>
</div>




@endsection


@section("scripts")

@endsection