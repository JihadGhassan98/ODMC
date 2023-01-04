<x-guest-layout>
@if(App::isLocale('en'))
    <p style="width: 70%; height:100vh; display:flex; flex-direction:column; justify-content:center; font-size:20px; text-align:center; margin:auto;
    font-weight:600;">
        Welcome to ODMC! <br>

We are a team of highly trained and experienced healthcare professionals, dedicated to providing top-quality medical care to our patients. Our clinic is equipped with state-of-the-art technology and resources to ensure that we can offer the best possible treatment and support to those in need.
We believe that healthcare is a fundamental right, and we strive to make our services accessible and affordable to all. We work closely with our patients to understand their unique needs and goals, and we tailor our treatments to suit each individual's circumstances.
<br>
Thank you for choosing ODMC as your healthcare provider. We look forward to working with you and helping you achieve your best possible health.
<a style="background-color: green; color:#fff; border-radius:10px; width:max-content; padding:10px; margin:10px auto; " href="{{url('/')}}">Home</a>    
</p>
@else
<p dir="rtl" style="width: 70%; height:100vh; display:flex; flex-direction:column; justify-content:center; font-size:20px; text-align:center; margin:auto;
font-weight:600;">
مرحبًا بك في ODMC! <br>

نحن فريق من المتخصصين في الرعاية الصحية المدربين تدريباً عالياً وذوي الخبرة ، مكرسين لتقديم رعاية طبية عالية الجودة لمرضانا. تم تجهيز عيادتنا بأحدث التقنيات والموارد لضمان قدرتنا على تقديم أفضل علاج ودعم ممكن للمحتاجين.

نعتقد أن الرعاية الصحية حق أساسي ، ونسعى جاهدين لجعل خدماتنا في المتناول وبأسعار معقولة للجميع. نحن نعمل عن كثب مع مرضانا لفهم احتياجاتهم وأهدافهم الفريدة ، ونصمم علاجاتنا لتناسب ظروف كل فرد.

شكرا لاختيارك لنا كمقدم الرعاية الصحية الخاص بك. نتطلع إلى العمل معك ومساعدتك في تحقيق أفضل صحة ممكنة.
<a style="background-color: green; color:#fff; border-radius:10px; width:max-content; padding:10px; margin:10px auto; " href="{{url('/')}}">الرئيسية</a>    

</p>
@endif
    
</body>
</html>
</x-guest-layout>