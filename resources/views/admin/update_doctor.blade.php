<!DOCTYPE html>
<html lang="en">
  <head>

    <style type="text/css">
     *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins',sans-serif;
    }
    
    .container{
      max-width: 540px;
      width: 100%;
      padding: 25px 30px;
      border: 1px solid white;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.15);
      justify-content: left;
    }
    .container .title{
      font-size: 25px;
      font-weight: 500;
      position: relative;
    }
    .container .title::before{
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 30px;
      border-radius: 5px;
    }
    .content form .user-details{
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin: 20px 0 12px 0;
    }
    
    form .user-details .input-box{
      margin-bottom: 15px;
      width: calc(100% / 2 - 20px);
    }
    form .input-box span.details{
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
    }
    .user-details .profile-box input{
      height: 30px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      transition: all 0.3s ease;

    } 
    .user-details .input-box input{
      color: black;
      height: 45px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      padding-left: 15px;
      border: 1px solid #ccc;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
    }
    .user-details .input-box input:focus,
    .user-details .input-box input:valid{
      border-color: #9b59b6;
    }
     
     form .category{
       display: flex;
       width: 80%;
       margin: 14px 0 ;
       justify-content: space-between;
     }
     form .category label{
       display: flex;
       align-items: center;
       cursor: pointer;
     }
     form .category label .dot{
      height: 18px;
      width: 18px;
      border-radius: 50%;
      margin-right: 10px;
      background: #d9d9d9;
      border: 5px solid transparent;
      transition: all 0.3s ease;
    }
     #dot-1:checked ~ .category label .one,
     #dot-2:checked ~ .category label .two,
     #dot-3:checked ~ .category label .three{
       background: #9b59b6;
       border-color: #d9d9d9;
     }
     form input[type="radio"]{
       display: none;
     }
     form .button input{
       height: 100%;
       width: 100%;
       border-radius: 5px;
       margin: .4rem;
       font-size: 1.2rem;
       font-weight: 500;
       letter-spacing: 1px;
       cursor: pointer;
       
     }
     form .button input:hover{
      /* transform: scale(0.99); */
      background: linear-gradient(-135deg, #71b7e6, #9b59b6);
      }

     @media(max-width: 600px){
     .container{
      max-width: 100%;
    }
    form .user-details .input-box{
        margin-bottom: 15px;
        width: 100%;
      }
      form .category{
        width: 100%;
      }
      .content form .user-details{
        max-height: 300px;
        overflow-y: scroll;
      }
      .user-details::-webkit-scrollbar{
        width: 5px;
      }
      }
      @media(max-width: 300px){
      .container .content .category{
        flex-direction: column;
      }
    }

    </style>

    <base href="/public">

    <!-- Required meta tags -->
    @include('admin.css');
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->


      
      @include('admin.sidebar');

      @include('admin.navbar');
      
      <div class="container-fluid page-body-wrapper">

                <div class="container">
              <div class="title">
                <h1 style="color: white; display: flex; justify-content: center; align-items: center;">Update Doctors Profile</h1>
              </div>
              <div class="content">


                  @if(Session::has('message'));

                  <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert">X</button>

                    {{ Session()->get('message') }}

                  </div>


                  @endif
                  
                <form action="{{ url('edit_doctor', $data->id) }}" method="POST" enctype="multipart/form-data">

                  @csrf


                  <div class="user-details">
                    <div class="input-box">
                      <span class="details">Full Name</span>
                      <input type="text" name="fullname"value="{{$data->fullname}}" required>
                    </div>
                    <div class="input-box">

                      <span class="details">Speciality</span>
                     <select style="width:200px; color:black;" name="speciality"  style="color:black;">
                      <option default value="{{$data->speciality}}">{{$data->speciality}}</option>
                      <option value="Skin">Skin</option>
                      <option value="Heart">Heart</option>
                      <option value="Eye">Eye</option>
                    </select>
                    </div>
                    <div class="input-box">
                      <span class="details">Email</span>
                      <input type="email" name="email" value="{{$data->email}}" required>
                    </div>
                    <div class="input-box">
                      <span class="details">Phone Number</span>
                      <input type="number" name="phone_number" value="{{$data->phone_number}}" required>
                    </div>
                    <div class="input-box">
                      <span class="details">Room number</span>
                      <input style="color:black;" type="number" name="room_number" value="{{$data->room_number}}" required>
                    </div>
                   <div class="profile-box">
                      <span class="details">Profile Picture</span>
                      <img height="60px" width="60px" src="doctorimage/{{$data->picture}}">
                    </div>

                    <div class="">
                      <span class="details">Change Profile</span>
                      <input style="color:black;" type="file" name="picture"  required>
                    </div>

                    <div class="p-3">
                      
                      <input type="submit" class="btn btn-success" value="Update Profile">
                    </div>

                    <!--

                     <div class="button pt-4">
                    <input type="submit" class="btn btn-success"  value="Update">
                    </div> 
                    
                     -->

                <!--  <div class="button">
                    <input type="submit" value="Register">
                  </div> -->


                </form>
              </div>
            </div>


      </div>
        
      @include('admin.script');
  </body>
</html>
