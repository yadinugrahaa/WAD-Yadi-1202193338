<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESD VENUE BOOKING</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./assets/3.css">
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

    <!-- PHP Section -->
    <?php
        $book_num = rand();
        $name = $_POST['name'];
        $checkin = $_POST['eventdate'];
        $checkin_dsply = '';
        $dur = $_POST['dur'];
        $checkout = '';
        $roomtype = $_POST['roomtype'];
        $phone = $_POST['phone_num'];
        $service = $_POST['service'];
        $service_dsply = 'no service';
        $total_price = 0;

        if(!empty($checkin)){
            $checkin_dsply = date('d/m/Y', strtotime($checkin));
            $checkout = date('d/m/Y', strtotime('+'.$duration.'day', strtotime($checkin)));
        }

        // TOTAL HARGA
        if($roomtype == 'card1'){
            $total_price = $duration*800;
        } else if($roomtype == 'card2'){
            $total_price = $duration*900;
        } else if($roomtype == 'card3'){
            $total_price = $duration*300;
        }

        //SERVIS
        if(isset($service)){
            $total_price += 20*count($service);
        }
        if(!empty($service)){
            $service_dsply = '';
            foreach($service as $srv){
                $service_dsply .= "<li> $srv </li>";
            }
        }
    ?>

    <!-- TABLE -->
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Booking Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Check-in</th>
                        <th scope="col">Check-out</th>
                        <th scope="col">Room Type</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Service</th>
                        <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?=$book_num?></th>
                        <td><?= $name?></td>
                        <td><?= $checkin_dsply?></td>
                        <td><?= $checkout?></td>
                        <td><?= $roomtype?></td>
                        <td><?= $phone?></td>
                        <td>
                            <ul>
                                <?=$service_dsply?>
                            </ul>
                        </td>
                        <td>$<?= $total_price?></td>
                    </tr>
                </tbody>
            </table>
            
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