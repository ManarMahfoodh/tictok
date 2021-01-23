<?php
require("auth.php");
?>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://me.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=pyW2Ljehm0JRV4q7l3S22qELUshS9NuILUCLIaFj51glea2pgIly_XqOK6XQ8imgrBHvb2xrdgiTN4pm2HhPhb7MFVB7CoFfAd9T-_xALg-Yjt2GbRS_oK9CgkkkwpZ9PmqsDG9Z7Ko2u9QHyVdAfY817BdpinbCJWLXekLEYFoOOv61RQAR5X3QmEkaZxwneWgLzShiiaRPHGtEwut08TeLEG0t7MCJMWUJIp2Kd5m8DzngfcY9ue1TfKNpK2bKI1UwHFR3aLHDVc18Rsf3qWfUJr1FWfpmvoSaI-vbwvJVlpwc3gQOP5LwrSYzTatZ_CY6QQGI9xqircXAj_3RkY_S0ReXMGXK2zP9sBg-Dv-ehEZ0s9ARn_P4szBdxKEQI3OdBJAtDjqRDcD_ZgWDb4ho5ITTEFhjJKp7WTgvTZWh6guhF9umnDWkj1q0aA40eJ8NRxBAdrSK4kDnKH61ImBmvEqTB9VLXI_Rq0Nfx_tauukg4JtjTtkMVGd2EkoMG23RDmXkjFfFnYLul0ekdzUa57GalO0xJ62vqSgEj7_PeOaIQCR-wvYcWexiwCutuYl5XTnXql_heO2_9RnJHOtSbQdDuxJpzUrXuArliJtsDZP3bY6C39DdLEmsLc-OWtZNWfWsWI8EYU88ZhuzmyOF7J7HstyAuioR-_RxeM7yD6IlRELe4LCQ2lQZg0GKpec6UPd0wh6Leh3IY8C6OSklKAY4pdGqJUH3Wy0FREiz-PT-evshofdz-wz_9V8Td0xKqlVSJq5GavWsG5jhh6nhnxGMIXn3_pBa1T6-gyhT3b7pGKbyeRUON2IP02NGZzE3U_vtp1KYldFX2WdZJpLlkLeOcgB5esFtFAjleDcDHHXkTs5ao0Hys-pPTJXsftYbd721IiAUGHZUpW1W4PGmi4QaYlHlp-XgWr1isxgQCy4BEDNFh88QC9_ZJTWhxtEqvhL57geR-CjADD7dTDlcy-PBmo15rLfUXOndU_XzC8au4hMUfVcOOGfKFgtwReLTNTUk0SpWvhuUdNgtd6IMDGZBKoMdg0Zj_IrnTB6CO1tYoR5QewuXlzm3pZyWIC8hnwe8oHcokdecE5IN0Q0uVJNN9tWRlO3lVv2f0qmdgtV6U91W16oMjVBZQgRqF5FJ4j5LyTnsevhORIDtTVWNW7wWSRh7CEnoMtweQDXZy_kcHw5sR1NuI-5QC6iV9jiF4_LdVH5kUQUFObtrGA" nonce="65d5e946c98c7b1e19300f1c58815fc5" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://me.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly9tYWlsLWF0dGFjaG1lbnQuZ29vZ2xldXNlcmNvbnRlbnQuY29tL2F0dGFjaG1lbnQvdS8wLz91aT0yJmlrPWI5ODZhYTE0Y2UmYXR0aWQ9MC4xNCZwZXJtbXNnaWQ9bXNnLWY6MTY4OTIzOTUzOTgzMzY4ODQ2NiZ0aD0xNzcxNjI2OTU4NTRkMTkyJnZpZXc9YXR0JmRpc3A9c2FmZSZyZWFsYXR0aWQ9Zl9razJxaDlhcjEzJnNhZGRiYXQ9QU5HamRKX2RQQ0ZRaTJTeDNTSmh6cVZSQlBKMzB3d2JveF85OXRaaFlvRzRPYlRoY3ZlN1BPOHJSSTR5T1BXTEZvTHBUN0RZUjZIUS13cnEwRE5rTWVLNjN4aGh5anNmWGhBSkhDdEFoSzZpNVByRnlwU0Z1UTZWX0FJd3p2Z3BUdE54NGROM1hMMEF5RVVod05OdXVIRDFnVzdsRGJoZFBJZUhXZnlxQjF3VDNIbXY0TW51QmV2R2lKdjRMMVFHOHhhWnhjamVlcnZmdkhPcnlwUmlKbzhCdE5COUlBVjdIaVJZX2JWRFZJWmhrbUhYTEp5SXp4cExObnhfcnFZWGVlZWxMUlR2Znc0bmk1VUdlMXp3TVBabU13VExPNzZFeXBHZmpLM0lOWW43MXJYZHZSUDY2LU9RcFQ2QVYzeHF3MTNIaWozQ1F3dmhiTlE5a3lOOFd3c1VFWXByLXd4NVA4V1ktMVQzeHFNN1dicjU4UlY2U3MxckswT0ZDVFF6dktNSWtUUXlmcFNsSEVPQW9iZlNoRkR2MGNzd25pM2Qzc1d2YllMWmJJeFJhLUVHMFQ2N3JVb055ZHZPT2dnX3Y1ODdWX2NNaEp1VFIwQ3pPZlJYNFhjcnMxcmZTd3MzMC0zUjlSWXNuN18xNzRTRHYwelJwd0JWaVFyaTNRNS1LUXZTNEpvWE5yTm9ieFZDdXMwTFE1eDFZcmY5bmRnUDA3Tml5Z3JUODZwVnduY25xRHQ4djdYQUVyRnRmeGhoaUlNZF95dlJOWVRIQWVoUjY0Uk9MLXhEVDhUWmlmUE1QUHNvZjd2OWNEMWg0djdrOThEaDN1OVpVeHF5RTFoVG85Szh5VTNJTk5Wd2tTMlFPdzNST18zZXpSRFlfNmprc0kwRl9rcm9sMlhMU0pHOVR1SEpkSFpZRGtGRllTWQ"/><style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("/w3images/coffeehouse.jpg");
  min-height: 75%;
}

.menu {
  display: none;
}


.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;

}

</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s3">
      <a href="show.php" class="w3-button w3-block w3-black" style="font-size:30px;">ORDERS</a>
    </div>
    <div class="w3-col s3">
      <a href="report.php" class="w3-button w3-block w3-black" style="font-size:30px;">MONTHLY REPORT</a>
    </div>
    <div class="w3-col s3">
      <a href="choosedeliver.php" class="w3-button w3-block w3-black" style="font-size:30px;">CHOOSE FOR DELIVERY</a>
    </div>
  </div>
</div>
<br/><br/><br/><br/><br/><br/>

<!--<footer class='footer'class="w3-container w3-teal w3-center w3-margin-top">
  <p>Find me on social media.</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>

</footer>

-->

</body>
</html>
