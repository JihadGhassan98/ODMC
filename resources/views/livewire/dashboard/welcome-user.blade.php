<div>
     <main class="db-body">   
     <span class="db-body__saperator">{{App::isLocale('ar')? 'ماذا تود أن تفعل؟':'What Would You Like To Do ?'}}</span>     
     <section class="db-user-links">
   
      
      <a href="{{url('/dashboard')}}" class="db-user-links__link">
          <img src="/systemImages/book.jpg" alt="" class="db-user-links__link--image">
          <div class="db-user-links__link--link-context">
               <span class="context-text">{{App::isLocale('ar')? 'حجز موعد':'Make An Appointment'}}</span>
         
          </div>
      </a>
      <a href="{{url('/dashboard')}}" class="db-user-links__link">
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
      <a href="{{url('/dashboard')}}" class="db-user-links__link">
          <img src="/systemImages/medicalBlogs.jpg" alt="" class="db-user-links__link--image">
          <div class="db-user-links__link--link-context">
               <span class="context-text">{{App::isLocale('ar')? 'المدونة الطبية':'Medical Blog'}}</span>
             
          </div>
      </a>
     </section>
     <span class="db-body__saperator">{{App::isLocale('ar')? 'آخر المقالات و العروض':'Latest Offers and Blogs'}}</span>     

     <section class="db-body__section-row">
<aside class="db-body__section-row--sidebar">
<div class="news-card">
     <img src="/systemImages/book.jpg" alt="" class="news-image">
     <span class="news-title">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam, ad.</span>
     <span class="news-date">12/12/2022</span>
<a href="#" class="news-author">{{App::isLocale('ar')? 'عيادة معينة':'Some Clinic'}}</a>
<a href="#" class="news-link">{{App::isLocale('ar')?'قراءة المزيد':'Read More'}}</a>
</div>
<div class="news-card">
     <img src="/systemImages/book.jpg" alt="" class="news-image">
     <span class="news-title">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam, ad.</span>
     <span class="news-date">12/12/2022</span>
<a href="#" class="news-author">{{App::isLocale('ar')? 'عيادة معينة':'Some Clinic'}}</a>
<a href="#" class="news-link">{{App::isLocale('ar')?'قراءة المزيد':'Read More'}}</a>
</div>
<div class="news-card">
     <img src="/systemImages/book.jpg" alt="" class="news-image">
     <span class="news-title">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam, ad.</span>
     <span class="news-date">12/12/2022</span>
<a href="#" class="news-author">{{App::isLocale('ar')? 'عيادة معينة':'Some Clinic'}}</a>
<a href="#" class="news-link">{{App::isLocale('ar')?'قراءة المزيد':'Read More'}}</a>
</div>
<div class="news-card">
     <img src="/systemImages/book.jpg" alt="" class="news-image">
     <span class="news-title">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam, ad.</span>
     <span class="news-date">12/12/2022</span>
<a href="#" class="news-author">{{App::isLocale('ar')? 'عيادة معينة':'Some Clinic'}}</a>
<a href="#" class="news-link">{{App::isLocale('ar')?'قراءة المزيد':'Read More'}}</a>
</div>


<a href="#" class="show-all-news">{{App::isLocale('ar')? 'عرض كل المقالات':'Show All Blogs'}}</a>


</aside>
     </section>
     </main>

</div>
