



<!---------------------Panel----------------------->
<div class="sidebar">
<ul class="ul">

<li class="li"><a href="insert_notes.php" class="anchor">Add notes</a></li>


<li class="li"><a href="view_notes.php" class="anchor">View Notes</a></li>
</ul>
<div class="sidebar-btn">
<span></span>
<span></span>
<span></span>
</div>
<script>
$(document).ready(function() {
  $('.sidebar-btn').click(function(){
	  $('.sidebar').toggleClass('visible');
	  }); 
});
</script>
</div>