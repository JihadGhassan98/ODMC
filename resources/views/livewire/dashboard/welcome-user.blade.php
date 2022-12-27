<div>
     <main class="db-body">   
     <span class="db-body__saperator">{{App::isLocale('ar')? 'ماذا تود أن تفعل؟':'What Would You Like To Do ?'}}</span>     
     <section class="db-user-links">
   
      
      <a href="{{url('/#offers')}}" class="db-user-links__link">
          <img src="/systemImages/book.jpg" alt="" class="db-user-links__link--image">
          <div class="db-user-links__link--link-context">
               <span class="context-text">{{App::isLocale('ar')? 'حجز موعد':'Make An Appointment'}}</span>
         
          </div>
      </a>
      <a href="{{url('/findVolunteer')}}" class="db-user-links__link">
          <img src="/systemImages/companion.jpg" alt="" class="db-user-links__link--image">
          <div class="db-user-links__link--link-context">
               <span class="context-text">{{App::isLocale('ar')? 'البحث عن متطوع':'Find A Volunteer'}}</span>
              
          </div>
      </a>
      <a href="{{url('/myMedicalRecords')}}" class="db-user-links__link">
          <img src="/systemImages/medicalRecord.jpg" alt="" class="db-user-links__link--image">
          <div class="db-user-links__link--link-context">
               <span class="context-text">{{App::isLocale('ar')? 'سجلي الطبي':'My Medical Record'}}</span>
        
          </div>
      </a>
   
     </section>
   
     </main>

</div>
