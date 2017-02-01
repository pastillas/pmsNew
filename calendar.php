
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>md-date-time-picker Examples</title>
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/component.css">
</head>
<style type="text/css">
td.po, th.pr,
td.pr, th.po{
  width: 20%;
}
</style>
<body>
  <div id="md-picker__date" class="md-picker md-picker-date md-picker--inactive animated">
    <div class="md-picker__body">
      <div id="md-date__viewHolder" class="md-picker__viewHolder animated">
        <ul class="md-picker__views">
          <li id="md-date__previous" class="md-picker__view">
            <div class="md-picker__month"></div>
            <div class="md-picker__grid">
              <div class="md-picker__th">
                <span>
                  S
                </span>
                <span>
                  M
                </span>
                <span>
                  T
                </span>
                <span>
                  W
                </span>
                <span>
                  T
                </span>
                <span>
                  F
                </span>
                <span>
                  S
                </span>
              </div>
              <div class="md-picker__tr"></div>
            </div>
          </li>
          <li id="md-date__current" class="md-picker__view">
            <div class="md-picker__month"></div>
            <div class="md-picker__grid">
              <div class="md-picker__th">
                <span>
                  S
                </span>
                <span>
                  M
                </span>
                <span>
                  T
                </span>
                <span>
                  W
                </span>
                <span>
                  T
                </span>
                <span>
                  F
                </span>
                <span>
                  S
                </span>
              </div>
              <div class="md-picker__tr"></div>
            </div>
          </li>
          <li id="md-date__next" class="md-picker__view">
            <div class="md-picker__month"></div>
            <div class="md-picker__grid">
              <div class="md-picker__th">
                <span>
                  S
                </span>
                <span>
                  M
                </span>
                <span>
                  T
                </span>
                <span>
                  W
                </span>
                <span>
                  T
                </span>
                <span>
                  F
                </span>
                <span>
                  S
                </span>
              </div>
              <div class="md-picker__tr"></div>
            </div>
          </li>
        </ul>
        <button id="md-date__left" class="md-button md-picker__left" type="button"></button>
        <button id="md-date__right" class="md-button md-picker__right" type="button"></button>
      </div>
      <ul id="md-date__years" class="md-picker__years md-picker__years--invisible animated"></ul>
      <div class="md-picker__action" style="display:none;">
        <button id="md-date__cancel" class="md-button" type="button">cancel</button>
        <button id="md-date__ok" class="md-button" type="button">ok</button>
      </div>
    </div>
    <div class="calendar-main">
      <div id="md-date__header" class="md-picker__header">
        <h3 class="white-text">Upcoming Deliveries</h3>
        <h4 id="md-date__title" class="md-picker__subtitle">
          <span id="md-date__subtitle"></span>
          <span id="md-date__titleDay"></span>
          <span id="md-date__titleMonth"></span>
        </h4>
      </div>
      <div class="input-field">
        <input id="search" type="search" required>
        <label for="search"><i class="material-icons">search</i></label>
        <i class="material-icons">close</i>
      </div>
      <div class="upDev">
        <table class="centered striped">
          <thead>
            <tr>
              <th class="po">PO No.</th>
              <th class="pr">PR No.</th>
              <th>Supplier</th>
              <th>Requesting Office</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td class="po"><a href="PO.php">12-0918</a></td>
              <td class="pr"><a href="PR.php">1918</a></td>
              <td>Bonning's</td>
              <td>City Procurement Office</td>
            </tr>
            <tr>
              <td class="po"><a href="PO.php">12-0918</a></td>
              <td class="pr"><a href="PR.php">1918</a></td>
              <td>Bonning's</td>
              <td>City Procurement Office</td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>


  </div>
  <script src="js/moment.min.js"></script>
  <script src="js/md-date-time-picker.js"></script>
  <script type="text/javascript">
    // (function() {
    /*var x = new mdDateTimePicker('date');
    document.getElementById('trigger').addEventListener('click', function() {
      x.toggle();
    });
    */
      var x = new mdDateTimePicker('date');
      x.toggle();
    // }).call(this);
  </script>

</body>

</html>