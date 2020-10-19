@extends('masters.profileMaster')

@section('title', 'Escort - FAQ')

@section('content')

<style>
.accordion {
  background-color: black;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: 1px solid;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;


}
.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;

}

</style>

    <div class="col-md-9 right-content">
        <div class="box multi_step_form">
            @foreach($data as $value)
            <button class="accordion">{{ $value->question }}</button>
            <div class="panel">
              <p><?php echo $value->answer; ?></p>
            </div>
            <br>
            <br>
            @endforeach
        </div>
    </div>
</section>
</div>

<script>
    var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

@endsection