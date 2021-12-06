<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css');
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      
      @include('admin.sidebar');

      @include('admin.navbar');


      <div class="container-fluid page-body-wrapper">

        <div align="center" style="padding-top: 100px;">

          <table>

               @if(Session::has('message'))

                <div class="alert alert-success">

                  <button type="button" class="close" data-dismiss="alert">X</button>

                  {{ Session()->get('message') }}

                </div>
              

               @endif

                <tr style="background-color: black;">

                  <th style="padding:10px;">Doctors Name</th>
                  <th style="padding:10px;">Speciality</th>
                  <th style="padding:10px;">Email</th>
                  <th style="padding:10px;">Phone</th>
                  <th style="padding:10px;">Room number</th>
                  <th style="padding:10px;">Image</th>
                  <th style="padding:10px;">Delete</th>
                  <th style="padding:10px;">Update</th>
                                   
                </tr>

                @foreach($data as $doctor)

                <tr align="center" style="background-color:skyblue; border: 1px solid black; padding-bottom: 100px;">

                  <td>{{ $doctor->fullname }}</td>
                  <td>{{ $doctor->speciality }}</td>
                  <td>{{ $doctor->email }}</td>
                  <td>{{ $doctor->phone_number }}</td>
                  <td>{{ $doctor->room_number }}</td>
                  <td><img height="100px" width="100px" src="doctorimage/{{$doctor -> picture}}"></td>
                  <td><a href="{{route('delete_doctor',$doctor->id)}}" class="btn btn-danger" onclick="return confirm('Do you want to Delete the doctors Profile?')">Delete</a></td>
                  <td><a href="{{route('update_doctor',$doctor->id)}}" class="btn btn-primary">Update</a></td>
                </tr>


                @endforeach


              </table>



        </div>


      </div>
      
              
      @include('admin.script');
  </body>
</html>
