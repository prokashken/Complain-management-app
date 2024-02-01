@if ($row->screenshot != null)
    <img class="rounded-10 mg-t-10 mg-l-auto mg-r-auto" style="height: 100px; width:100px; border-redius:5px;" src='{{asset("public/screenshots/$row->screenshot")}}'>
@endif