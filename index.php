<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Title</title>
</head>
<body>
    <div class="w-100">
        <div class="container-fluid container-lg">
            <div class="row flex-wrap">
                <div class="col-12 d-flex justify-content-center">
                    <h3>Select your Packages.</h3>
                </div>
                <div id="price">
  <!--price tab-->
  <div class="plan">
    <div class="plan-inner">
      <div class="entry-title">
        <h3>Standard Package</h3>
        <div class="price">200Tsh<span>/Per 2.5hrs</span>
        </div>
      </div>
      <form action="C2BSingleStageWithSession.php" method="post">
        <div class="entry-content">
            <ul>
            <li><strong> 2:30 Hrs</strong></li>
            <li><strong>1x</strong> Device</li>
            <!-- <li><strong>12</strong> points</li> -->
            
            <li><strong>Unlimited</strong></li>
            <li class="d-flex px-2 align-items-center">
                <label for="phoneNumber" class="col-3"><strong>Phone:</strong></label>
                <input type="text" class=" form-control col-9" id="phoneNumber" style="width: auto !important;" name="phone" placeholder="768241906" required />
            </li>
            </ul>
        </div>
        <input type="hidden" name="amount" value="200" style="visibility: hidden;" />
        <div class="">
            <button type="submit" class="btn connect bg-dark text-algo px-4 py-2" name="connect">Connect</button>
        </div>
      </form>
    </div>
  </div>
  <div class="plan basic">
    <div class="plan-inner">
      <div class="entry-title">
        <h3>delux Package</h3>
        <div class="price">400Tsh<span>/Per 5.5hrs</span>
        </div>
      </div>
      <form action="C2BSingleStageWithSession.php" method="post">
        <div class="entry-content">
            <ul>
            <li><strong> 5:00 Hrs</strong></li>
            <li><strong>1x</strong> Device</li>
            <!-- <li><strong>12</strong> points</li> -->
            
            <li><strong>Unlimited</strong></li>
            <li class="d-flex px-2 align-items-center">
                <label for="phoneNumber" class="col-3"><strong>Phone:</strong></label>
                <input type="text" class=" form-control col-9" id="phoneNumber" style="width: auto !important;" name="phone" placeholder="768241906" required/>
            </li>
            </ul>
        </div>
        <input type="hidden" name="amount" value="400" style="visibility: hidden;" />
        <div class="">
            <button type="submit" class="btn connect bg-dark text-algo px-4 py-2" name="connect">Connect</button>
        </div>
      </form>
    </div>
  </div>
  <div class="plan standard">
    <div class="plan-inner">
      <div class="entry-title">
        <h3>Executive Package</h3>
        <div class="price">600Tsh<span>/Per 8.5hrs</span>
        </div>
      </div>
      <form action="C2BSingleStageWithSession.php" method="post">
        <div class="entry-content">
            <ul>
            <li><strong> 8:00 Hrs</strong></li>
            <li><strong>1x</strong> Device</li>
            <!-- <li><strong>12</strong> points</li> -->
            
            <li><strong>Unlimited</strong></li>
            <li class="d-flex px-2 align-items-center">
                <label for="phoneNumber" class="col-3"><strong>Phone:</strong></label>
                <input type="text" class=" form-control col-9" id="phoneNumber" style="width: auto !important;" name="phone" placeholder="768241906" required/>
            </li>
            </ul>
        </div>
        <input type="hidden" name="amount" value="600" style="visibility: hidden;" />
        <div class="">
            <button type="submit" class="btn connect bg-dark text-algo px-4 py-2" name="connect">Connect</button>
        </div>
      </form>
    </div>
  </div>
  
 
</div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script >
        const phoneNumberInput = document.querySelector('input[name="phone"]');
        const pattern = /^[67][0-9]{8}$/;

        phoneNumberInput.addEventListener('input', function() {
        const phoneNumber = this.value;
        if (pattern.test(phoneNumber)) {
            // Valid phone number format
            console.log('Valid phone number');
        } else {
            // Invalid phone number format
            console.log('Invalid phone number');
        }
        });

    </script>
</body>
</html>