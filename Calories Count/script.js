// written by: Alec Richardson
// tested by: Alec Richardson
// debugged by: Alec Richardson

$(document).ready(function() {
  $(function() {
    evaluatePath(location.pathname);

    $(".async .async-link").click(function(e) {
      e.preventDefault();

      $(".async")
        .find("a.active")
        .removeClass("active");
      $(this).addClass("active");

      var request = $(this).attr("href");
      history.pushState(null, null, request);
      evaluatePath(request);
    });

    $(window).on("popstate", function() {
      evaluatePath(location.pathname);
    });
  });
});
function stageContent(content) {
  $("#content").html(content);
}

function changeActive(data) {
  var navItem = "#" + data;
  $(".async")
    .find("a.active")
    .removeClass("active");
  $(navItem).addClass("active");
}

function evaluatePath(path) {
  var request = path.split("/").pop();

  switch (request) {
    case "nutrition":
      $.get("./Components/Nutrition/Nutrition.php", stageContent);
      break;
    case "contact":
      $.get("./Components/Contact/Contact.php", stageContent);
      break;
    case "workouts":
      $.get("./Components/Workouts/Workouts.php", stageContent);
      break;
    case "upper-body":
      $.get("./Components/Workouts/UpperBody.php", stageContent);
      break;
    case "lower-body":
      $.get("./Components/Workouts/LowerBody.php", stageContent);
      break;
    case "login":
      $.get("./Components/Auth/loginForm.php", stageContent);
      break;
    case "register":
      $.get("./Components/Auth/createUserForm.php", stageContent);
      break;
    case "forum":
      $.get("./Components/Forum/Forum.php", stageContent);
      break;
    case "create-post":
      $.get("./Components/Forum/PostForm.php", stageContent);
      break;
    case "post":
      $.get("./Components/Forum/Post.php", stageContent);
      break;
    case "reply":
      $.get("./Components/Forum/ReplyForm.php", stageContent);
      break;
    case "dashboard":
      $.get("./api/authenticate.php", function(data) {
        if (data === "success") {
          $.get("./Components/CalorieLog/calorieLog.php", stageContent);
        } else {
          history.pushState(null, null, "login");
          evaluatePath("login");
          changeActive("login");
        }
      });
      break;
    case "enter-meal":
      $.get("./Components/CalorieLog/calorieLogForm.php", stageContent);
      break;
    case "edit-meal":
      $.get("./Components/CalorieLog/editLogForm.php", stageContent);
      break;
    case "profile":
      $.get("./Components/Profile/Profile.php", stageContent);
      break;
    case "update-goals":
      $.get("./Components/Profile/GoalsForm.php", stageContent);
      break;
    case "edit-account":
      $.get("./Components/Profile/AccountForm.php", stageContent);
      break;
    default:
      $.get("./Components/Landing/Landing.php", stageContent);
  }
}
