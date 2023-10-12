# ParKing-Web-Client

# Setting up.
- Download Marta's .SQL dump
- Set up local DB
- Create a file 'config_local.php' with following structure

```
<?php

return array(
    'host' => '',
    'dbname' => '',
    'username' => '',
    'password' => '',
);
?>
```

# To do
- [ ] REFACTOR ALL DB VARs
# User profile
- [ ] Use data from database:
    - [ ] Profile picture
    - [ ] Profile picture change
    - [ ] email, password change
    - [X] XP display
    - [X] Level display 
    - [ ] mechanics of XP bar and levels?
    - [ ] Plan and expiry date display
    - [ ] Add a parking space
    - [ ] Load parking spaces
    - [ ] View parking space (view reservation!)
    - [ ] Load favorites
    - [ ] View favorites (show infopage from parking list)

## Clicking on "View Parking Space"
- [ ] Add functionality to cancel reservation.
- [ ] Load data from DB, update map widget


# Parking list
- [ ] Implement premium filtering
- [ ] General filters + Search

# Reviews
- [ ] Writing a review
- [ ] Reporting a problem
- [ ] Displaying reviews

# Parking spot - more info
- [ ] I've arrived button. What is the exact functionality?
- [ ] Reserve

# Registration
- [ ] Create registration form.
- [ ] Premium subscription signup. Notify banking team?