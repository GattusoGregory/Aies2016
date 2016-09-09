<?php
function get_UploadFile($file)
{
    $allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if ((($file["type"] == "video/mp4")
    || ($file["type"] == "audio/mp3")
    || ($file["type"] == "audio/wma")
    || ($file["type"] == "image/pjpeg")
    || ($file["type"] == "image/gif")
    || ($file["type"] == "image/jpeg"))

    && ($file["size"] < 20000)
    && in_array($extension, $allowedExts))

      {
      if ($file["error"] > 0)
        {
        echo "Return Code: " . $file["error"] . "<br />";
        }
      else
        {
        echo "Upload: " . $file["name"] . "<br />";
        echo "Type: " . $file["type"] . "<br />";
        echo "Size: " . ($file["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $file["tmp_name"] . "<br />";

        if (file_exists("upload/" . $file["name"]))
          {
          echo $file["name"] . " already exists. ";
          }
        else
          {
          move_uploaded_file($file["tmp_name"],
          "upload/" . $file["name"]);
          echo "Stored in: " . "upload/" . $file["name"];
          }
        }
      }
    else
      {
      echo "Invalid file";
      }
}
  ?>