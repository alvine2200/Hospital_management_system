  <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        
       @foreach($doctor as $doctors)

        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img height="400px" src="doctorimage/{{ $doctors->picture }}" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>

            <div class="body">
              <p class="text-l mb-0">Doctor Name: {{ $doctors->fullname }}</p>
              <span class="text-sm text-grey"> Speciality: {{  $doctors->speciality }}</span>
               <span class="text-sm text-grey"> Phone_number: {{ $doctors->phone_number }}</span>
                <span class="text-sm text-grey"> Room number: {{ $doctors->room_number }}</span>
                 
            </div>
          </div>
         </div>

        @endforeach
        
      </div>
    </div>
  </div>
