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
                  <th style="padding:10px;">Customer Name</th>
                  <th style="padding:10px;">Email</th>
                  <th style="padding:10px;">Phone</th>
                  <th style="padding:10px;">Doctor Name</th>
                  <th style="padding:10px;">Date</th>
                  <th style="padding:10px;">Messages</th>
                  <th style="padding:10px;">Status</th>
                  <th style="padding:10px;">Approved</th>
                  <th style="padding:10px;">Cancelled</th>
                </tr>
              


                @foreach($data as $appoint)
                <tr align="center" style="background-color:skyblue; border: 1px solid black; padding-bottom: 100px;">
                  <td>{{ $appoint->name }}</td>
                  <td>{{ $appoint->email }}</td>
                  <td>{{ $appoint->phone }}</td>
                  <td>{{ $appoint->doctor }}</td>
                  <td>{{ $appoint->date }}</td>
                  <td>{{ $appoint->message }}</td> 
                  <td>{{ $appoint->status }}</td>

                  <td>
                    <a class="btn btn-success" href="{{ route('approved', $appoint->id)}}">Approved</a>
                  </td>

                  <td>
                    <a class="btn btn-danger" onclick="return confirm('Do you want to cancel the appointment')" href="{{ route('cancel', $appoint->id)}}">Cancelled</a>
                  </td>
                  
                </tr>

                @endforeach

            </table>

          </div>

      </div>
      
    
        
      @include('admin.script');
  </body>
</html>
