<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Emails Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used for various emails that
    | we need to display to the user. You are free to modify these
    | language lines according to your application's requirements.
    |
    */

    /*
     * Activate new user account email.
     *
     */

    'activationSubject'  => 'Activation required',
    'activationGreeting' => 'Welcome!',
    'activationMessage'  => 'You need to activate your email before you can submit your entries..',
    'activationButton'   => 'Activate',
    'activationThanks'   => 'Thank you for signing up!',

    /*
     * Goobye email.
     *
     */
    'goodbyeSubject'  => 'Sorry to see you go...',
    'goodbyeGreeting' => 'Hello :username,',
    'goodbyeMessage'  => 'We are very sorry to see you go. We wanted to let you know that your account has been deleted. Thank you for the time we shared. You have '.config('settings.restoreUserCutoff').' days to restore your account, if you wish to come back.',
    'goodbyeButton'   => 'Restore Account',
    'goodbyeThanks'   => 'We hope to see you again!',
    
    
    /*
     * Entry email.
     *
     */
    'entrySubject'  => 'Happy to see you made your first entry...',
    'entryGreeting' => 'Hello :username,',
    'entryMessage'  => 'We are happy to see you made your first entry. To increase your chances of catching the judges ears, you can submit 2 more entries to your profile.',
    'entryButton'   => 'Submit Another Entry',
    'entryThanks'   => 'Best of luck!',

];
