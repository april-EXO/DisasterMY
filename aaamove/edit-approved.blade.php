<form action="" method="POST">
    @csrf
    <form action="" method="POST" class="formContainer">
            @csrf
          <label for="event">
            <strong>Event Type</strong>
          </label>
          <select name="event" id="event">
            <option value="flood" <?php if ($approved['event'] == "flood") echo "selected"; ?>> Flood </option>
            <option value="landslide" <?php if ($approved['event'] == "landslide") echo "selected"; ?>> Landslide </option>
            <option value="forestfire" <?php if ($approved['event'] == "forestfire") echo "selected"; ?>> Forest Fire </option>
            <option value="others" <?php if ($approved['event'] == "others") echo "selected"; ?>> Others </option>
            </select>
            <br>
            <br>
            <br>
            <label for="location">
            <strong>Location</strong>
          </label>
          <input type="text" id="location" name="location" required value={{$approved['location']}}>
          <br>
          <label for="date">
          <strong>Date</strong>
          </label>
          <input type="date" id="date" name="date" required value={{$approved['date']}}>
          <br>
          <br>
          <label for="time">
          <strong>Time</strong>
          </label>
          <input type="time" id="time" name="time" required value={{$approved['time']}}>
          <br>
          <label for="remark">
            <strong>Remark</strong>
          </label>
          <input type="text" id="remark" name="remark" required value={{$approved['remark']}}>
          <br>
          <br>
          <button type="submit" class="btn">Submit changes</button>
          <button type="button" class="btn cancel" onclick="history.back();">Back</button>
        </form>