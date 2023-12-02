<?php
function get_CURL($url)
{
  // Initialize cURL
  $ch = curl_init();

  // Set cURL options
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  // Execute cURL request
  $response = curl_exec($ch);

  // Close cURL
  curl_close($ch);

  // Decode the JSON response
  return json_decode($response, true);
};

$dataChannel = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet&part=statistics&id=UCWV3obpZVGgJ3j9FVhEjF2Q&key=AIzaSyDT8guY9gNxkbJ4XLdivKV0gjrv3rwmc-k');

$dataLatestVideo = get_CURL('https://www.googleapis.com/youtube/v3/search?channelId=UCWV3obpZVGgJ3j9FVhEjF2Q&key=AIzaSyDT8guY9gNxkbJ4XLdivKV0gjrv3rwmc-k&part=snippet&maxResults=1&order=date');

$dataAnotherVideos = get_CURL('https://www.googleapis.com/youtube/v3/search?key=AIzaSyDT8guY9gNxkbJ4XLdivKV0gjrv3rwmc-k&channelId=UCWV3obpZVGgJ3j9FVhEjF2Q&order=date&maxResults=6&part=snippet');

// data channel
$youtubeProfilPict = $dataChannel["items"][0]["snippet"]["thumbnails"]["medium"]["url"];
$youtubeName = $dataChannel["items"][0]["snippet"]["title"];
$youtubeSubsCount = $dataChannel["items"][0]["statistics"]["subscriberCount"];
$youtubeDesc = $dataChannel["items"][0]["snippet"]["localized"]["description"];

// latest video
$idLatestVideo = $dataLatestVideo["items"][0]["id"]["videoId"];

// another videos
$allVideos = [];
foreach ($dataAnotherVideos["items"] as $video) {
  $allVideos[] = $video;
  // $allVideosThumbhanils[] = $video["snippet"]["thumbnails"]["medium"]["url"];
  // $allVideosDesc[] = $video["snippet"]["description"];
};
// var_dump($allVideos);
// var_dump($allVideosThumbhanils);
// var_dump($allVideosDesc);

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- My CSS -->
  <link rel="icon" type="image/x-icon" href="img/real-madrid-logo.png">
  <link rel="stylesheet" href="style/style.css">
  <title><?= $youtubeName; ?> Channel</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#home"><?= $youtubeName; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav >
          <li class=" nav-item">
          <a class="nav-link" id="textNavbarr" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="textNavbarr" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="textNavbarr" href="#youtubee">Youtube</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="textNavbarr" href="#randomVideo">Videos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="video-container" id="home">
    <video autoplay muted loop id="trailer">
      <source src="videos/real-madrid-video.mp4" type="video/mp4">
    </video>
    <img src="img/real-madrid-logo.png" class="logo">
    <div class="textHome">
      <h1 class="titleHome display-4">Real Madrid YouTube Experience</h1>
      <!-- <h1 class="display-4"><?= $youtubeName; ?></h1> -->
      <h3 class="titleHome2 lead mt-3">Hala Madrid!</h3>
    </div>
  </div>

  <!-- About -->
  <section class="about mt-5" id="about">
    <div class="container">
      <div class="row mb-4">
        <div class="col text-center">
          <h2>About</h2>
        </div>
      </div>
      <div class="row justify-content-center text-justify">
        <div class="col-md-5">
          <p>Real Madrid, founded in 1902, is a powerhouse in the world of football with an extraordinary legacy. The club is based in Madrid, Spain, and has earned a reputation for its relentless pursuit of excellence. Real Madrid boasts an illustrious history, highlighted by numerous La Liga and UEFA Champions League titles, making it one of the most successful football clubs in the world. With a rich tradition of nurturing homegrown talent and signing some of the greatest footballers in history, including Cristiano Ronaldo and Zinedine Zidane, Real Madrid has consistently provided fans with thrilling matches and iconic moments.</p>
        </div>
        <div class="col-md-5">
          <p>Real Madrid's influence extends far beyond the football pitch. The club embodies a culture of excellence, teamwork, and determination that has inspired countless individuals around the world. The club's iconic all-white jerseys and the echoing chants of "Hala Madrid" resonate with fans worldwide. Real Madrid's commitment to achieving greatness, both domestically and internationally, continues to captivate the hearts of football enthusiasts, cementing its place as an enduring symbol of footballing excellence. The Santiago Bernabéu Stadium is an iconic football stadium which serves as the headquarters of the Real Madrid club.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Youtube & Instagram -->
  <section class="youtube bg-dark">
    <div class="container">

      <div class="row pt-4 mb-5">
        <div class="col text-center">
          <h1 id="youtubee">Youtube</h1>
        </div>
      </div>

      <div class="row justify-content-center mt-5">
        <div class="col-md-5">
          <div class="row">
            <div class="col-md-4">
              <a href="https://www.youtube.com/channel/UCWV3obpZVGgJ3j9FVhEjF2Q" target="_blank" style="text-decoration: none; color: black;">
                <img src="<?= $youtubeProfilPict; ?>" width="200" class="rounded-circle img-thumbnail">
              </a>
            </div>
            <div class="col">
              <a href="https://www.youtube.com/channel/UCWV3obpZVGgJ3j9FVhEjF2Q" target="_blank" style="text-decoration: none; color: black;">
                <h5 id="youtubee"><?= $youtubeName; ?></h5>
              </a>
              <p id="youtubee"><?= $youtubeSubsCount; ?> Subscribers</p>
              <div class="g-ytsubscribe" data-channelid="UCWV3obpZVGgJ3j9FVhEjF2Q" data-layout="default" data-count="default"></div>
            </div>
          </div>
          <div class="row mt-4 pb-5">
            <div class="col">
              <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/<?= $idLatestVideo; ?>?rel=0" title="YouTube video" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="row text-justify">
            <p id="youtubee"><?= $youtubeDesc; ?></p>
            <a class="btn btn-danger" href="https://www.youtube.com/channel/UCWV3obpZVGgJ3j9FVhEjF2Q" type="button" target="_blank">Go to Channel</a>
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- YouTube Video & YouTube Shorts -->
  <section class="randomVideo" id="randomVideo">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>YouTube Videos & YouTube Shorts</h2>
        </div>
      </div>
      <div class="row">

        <?php foreach ($allVideos as $video) : ?>
          <div class="col-md-4 my-3 mb-4">
            <div class="card h-100">
              <a href="https://youtu.be/<?= $video["id"]["videoId"]; ?>?" target="_blank">
                <img class="card-img-top" src="<?= $video["snippet"]["thumbnails"]["medium"]["url"]; ?>" alt="Card image cap">
              </a>
              <div class="card-body">
                <a href="https://youtu.be/<?= $video["id"]["videoId"]; ?>?" target="_blank">
                  <h5 style="cursor: pointer;"><?= $video["snippet"]["title"]; ?></h5>
                </a>
                <p class="card-text"><?= $video["snippet"]["description"]; ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>

  <!-- Suggestion Form-->
  <section class="suggestionForm bg-light" id="suggestionForm">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Suggestion Form</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-4">
          <div class="card bg-primary text-white mb-4 text-center">
            <div class="card-body">
              <h5 class="card-title">Give us your suggestions</h5>
              <p class="card-text">We would appreciate receiving feedback for our YouTube account to help it grow even better.</p>
            </div>
          </div>

          <ul class="list-group mb-4">
            <li class="list-group-item">
              <h3>Location</h3>
            </li>
            <li class="list-group-item">Santiago Bernabéu Stadium</li>
            <li class="list-group-item">Av. de Concha Espina, 1, 28036</li>
            <li class="list-group-item">Madrid, Spanyol</li>
          </ul>
        </div>

        <div class="col-lg-6">

          <form>
            <div class="form-group">
              <label for="nama">Name</label>
              <input type="text" class="form-control" id="nama">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" class="form-control" id="phone">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" rows="3"></textarea>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-primary">Send Message</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>

  <!-- footer -->
  <footer class="bg-dark text-white mt-5">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <p>Copyright &copy; Muhammad Faisal Yudiansah 2023</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="https://apis.google.com/js/platform.js"></script>
</body>

</html>