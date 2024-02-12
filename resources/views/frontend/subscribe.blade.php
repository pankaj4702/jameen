<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Rezilla</title>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <!-- font awesome style -->
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <script src="https://code.jquery.com"> </script>
  <style>
    body {
      display: flex;
      direction: 'column';
    }

    .column-first , .column-second ,.column-third {
      border: 1px solid #ccc;
      margin: 20px;
      padding: 20px;
    }

    .para-first , .para-second, .para-third {
      text-align: center;
      margin-bottom: 50px;
    }
    .mypara{
        font-size: 12px;
        text-align: center;
    }
    .container{
        display: flex;
        margin: 163px auto;
        height: 400px;
    }

  </style>
</head>
<body>
    <div class="container">
    <div class="column-first">
        <p class="para-first">
          <b>BASIC PLAN</b><br />$500/month
        </p>
        <p class="mypara">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias tempore, asperiores tenetur magni facere voluptatibus velit beatae delectus .</p>
        <div id="paypal-button-container-P-8G715519VC094944SMWYLC5Q"></div> <!-- Replace with your plan ID -->
      </div>
      <div class="column-second">
        <p class="para-second">
         <b>STANDERD PLAN</b><br />$1000/month
        </p>
        <p class="mypara">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias tempore, asperiores tenetur magni facere voluptatibus velit beatae delectus .</p>
        <div id="paypal-button-container-s-P-3RK77677LG1149824MWYLC5Y"></div> <!-- Replace with your plan ID -->
      </div>
      <div class="column-third">
        <p class="para-third">
         <b>PREMIUM PLAN</b><br />$1500/month
        </p>
        <p class="mypara">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias tempore, asperiores tenetur magni facere voluptatibus velit beatae delectus .</p>
        <div id="paypal-button-container-t-P-1A979851D0322544MMWYLC6A"></div> <!-- Replace with your plan ID -->
      </div>
    </div>

<script src="https://www.paypal.com/sdk/js?client-id=Ad7FmonAEv6O7YQmD4cepFlG96Pa4GbLRMZQgeFTnkOxAGqIpBxTVHESPwfDTghXEKwcS-wqMfnOKD_U&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
<script>

  paypal.Buttons({
      style: {
          shape: 'pill',
          color: 'blue',
          layout: 'horizontal',
          label: 'subscribe'
      },
      createSubscription: function(data, actions) {
        var dynamicPlanPrice = 500;
        return actions.subscription.create({
          /* Creates the subscription */
          plan_id: 'P-8G715519VC094944SMWYLC5Q',


        });
      },
      onApprove: function(data, actions) {
        alert(data.subscriptionID); // You can add optional success message for the subscriber here
      }
  }).render('#paypal-button-container-P-8G715519VC094944SMWYLC5Q'); // Renders the PayPal button
</script>
<script>

    paypal.Buttons({
        style: {
            shape: 'pill',
            color: 'blue',
            layout: 'horizontal',
            label: 'subscribe'
        },
        createSubscription: function(data, actions) {
          var dynamicPlanPrice = 1000;
          return actions.subscription.create({
            /* Creates the subscription */
            plan_id: 'P-3RK77677LG1149824MWYLC5Y',


          });
        },
        onApprove: function(data, actions) {
          alert(data.subscriptionID); // You can add optional success message for the subscriber here
        }
    }).render('#paypal-button-container-s-P-3RK77677LG1149824MWYLC5Y'); // Renders the PayPal button
  </script>
  <script>

    paypal.Buttons({
        style: {
            shape: 'pill',
            color: 'blue',
            layout: 'horizontal',
            label: 'subscribe'
        },
        createSubscription: function(data, actions) {
          var dynamicPlanPrice = 1500;
          return actions.subscription.create({
            /* Creates the subscription */
            plan_id: 'P-1A979851D0322544MMWYLC6A',


          });
        },
        onApprove: function(data, actions) {
          alert(data.subscriptionID); // You can add optional success message for the subscriber here
        }
    }).render('#paypal-button-container-t-P-1A979851D0322544MMWYLC6A'); // Renders the PayPal button
  </script>
</body>
</html>
