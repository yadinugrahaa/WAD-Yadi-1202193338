<!DOCTYPE html>
<html>

<head>
     <title>ESD VENUE</title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <link rel="stylesheet" type="text/css" href="./assets/2.css">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="">Booking <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- PHP -->
    <?php
        $method_selected = '';
        $image_selected = '';
        $standard_bk = isset($_POST['card1']);
        $superior_bk = isset($_POST['card2']);
        $luxury_bk = isset($_POST['card3']);
        $img_src = [
            "a.jpg",
            "b.jpg",
            "c.jpg"
        ];

        // Button untuk booking
        if ($standard_bk) {
            $method_selected = '
                <select class="custom-select" name="roomtype" disabled>
                <option value="Mepro Hall">Mepro Hall</option>
                <input type="hidden" name="roomtype" value="Mepro Hall">
                </select>';
            $image_selected = $img_src[0];
        } else if ($superior_bk){
            $method_selected = '
                <select class="custom-select" name="roomtype" disabled>
                <option value="Garuda Hall">Garuda Hall</option>
                <input type="hidden" name="roomtype" value="Garuda Hall">
                </select>';
            $image_selected = $img_src[1];
        }else if ($luxury_bk){
            $method_selected = '
                <select class="custom-select" name="roomtype" disabled>
                <option value="Gedung Serba Guna">Gedung Serba Guna</option>
                <input type="hidden" name="roomtype" value="Gedung Serba Guna">
                </select>';
            $image_selected = $img_src[2];
        
        }else {
            $method_selected = '
                <select class="custom-select" name="roomtype">
                <option value="Peta Park">Peta Park</option>
                <option value="Bandung Convention Center">Bandung Convention Center</option>
                <option value="Bandung Convention Center">Bandung Convention Center</option>
                </select>';
            $image_selected = $img_src[0];
        }
    ?>

    <!-- ISI Content -->
    
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
        <div class="container bg-dark">
        <p class="text-light text-center">Reserve your venue now ! <br></p>
        </div>
    
            <div class="col-md-6">
                <form action="mybooking.php" method="post">
                    <div class="form-group">
                        Name
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        Event Date
                        <input type="date" class="form-control" name="eventdate">
                    </div>
                    <div class="form-group">
                        Start Time 
                        <input type="time" class="form-control" name="starttime">
                    </div>
                    <div class="form-group">
                        Duration(hours)
                        <input type="number" class="form-control" name="duration" aria-describedby="dur_info" value=0>
                    </div>
                    <div class="form-group">
                        Building Type
                        <?=$method_selected?>
                    </div>
                    <div class="form-group">
                        Phone Number
                        <input type="number" class="form-control" name="phone_num">
                        <br>
                    <div class="form-group">
                        Add Service(s)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="service[]" value="Room Services"
                                id="service_check1">
                            Catering / $700
                            <br/>
                            <input class="form-check-input" type="checkbox" name="service[]" value="Breakfast"
                                id="service_check2">
                            Decoration / $450
                            <br/>
                            <input class="form-check-input" type="checkbox" name="service[]" value="Room Services"
                                id="service_check1">
                            Sound System / $250
                            <br/>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Book"></input>
                    </div>
                </form>
            </div>
             
            <!-- End Content -->

        
            <div class="col-md-auto">
                <img src=<?=$image_selected?> alt="Preview Bedroom" class="image-preview">
            </div>

        </div>
    </div>
    <div class="card-body">
          <blockquote class="blockquote mb-0">
               <footer class="text-center" class="blockquote-footer"> Created by: <cite title="Source Title">Yadi_1202193338</cite></footer>
          </blockquote>
          </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>