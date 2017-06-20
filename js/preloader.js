$("#laserbar").addClass("waiting");
$({ width: 0 }).animate(
  { width: 100 },
  {
    duration: 10000,
    step: function() {
      $("#laserbar").css("width", this.width + "%");
    },
    complete: function() {
      $("#laserbar").toggleClass("done");
      console.log("loading complete");
    }
  }
);
