<?php

class EditorInformation extends Eloquent {
	
	protected $connection = 'editor_mysql';

	/**
	 * Get the user's canvas.
	 *
	 * @return array
	 */
	public function user_canvas()
	{
		//return $this->hasMany('Canvas', 'editor_information_id');
		return $this->hasMany('Canvas');
	}
	
	/**
	 * Get the user's account.
	 *
	 * @return array
	 */
	public function user_account()
	{
		return $this->belongsTo('User', 'id');
	}
	
	
	
	
    //========================================================================================
    
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
