<?php
include 'functions/init.php';
?>
<!DOCTYPE html>
<title>Intuji Assignment</title>
<style>

body {
	background: #eee !important;	
}

.wrapper {	
	margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
}
  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}
	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		&:focus {
		  z-index: 2;
		}
	}

	input[type="date"]{
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}
    .btn{
        height: 2rem; 
        cursor:pointer;
        background:#037facd4;
        color:white;
        border:unset;
    }
</style>
<body>
    <div class="wrapper">
        <form class="form-signin" action="submit" method="POST">
            <h2 class="form-signin-heading">Create Events</h2>
            <label for="title">Event Title:</label>
            <input type="text" class="form-control" name="summary" placeholder="Event Title" required="" autofocus="" />

            <label for="start">Start DateTime:</label>
            <input type="datetime-local" class="form-control" name="start" placeholder="Start Date" required="" autofocus="" />

            <label for="title">End DateTime:</label>
            <input type="datetime-local" class="form-control" name="end" placeholder="End Date" required="" autofocus="" />

            <input class="btn"  type="submit" value="Save"/>
        </form>
    </div>
</body>
</html>




