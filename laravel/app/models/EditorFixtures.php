<?php

use Illuminate\Support\Facades\URL;

class EditorFixtures extends Eloquent {

    /**
     * Get the scene's owner.
     *
     * @return User
     */
    public function scene() {
        return $this->belongsTo('Scene', 'scene_id');
    }

    /**
    * Check to see if URL is Valid
    *
    *
    */
    public function isValidFile()
    {
	
    }

    /**
     * Get the date the post was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

    /**
     * Returns the date of the blog post creation,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function created_at()
    {
        return $this->date($this->created_at);
    }

    /**
     * Returns the date of the blog post last update,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function updated_at()
    {
        return $this->date($this->updated_at);
    }
}
