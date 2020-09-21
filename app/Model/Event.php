<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Event extends Model implements \MaddHatter\LaravelFullcalendar\Event 
{
    //
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Model\User');
    }

    public function admin() {
        return $this->belongsTo('App\Model\Admin');
    }

    public function setAdminIdAttribute($value)
    {
        $this->attributes['admin_id'] = json_encode($value);
    }

    // public function getAdminIdAttribute($value)
    // {
    //     return $this->attributes['admin_id'] = json_decode($value);
    // }
    
    protected $dates = ['start', 'end'];

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return $this->is_all_day;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Get the event's ID
     *
     * @return int|string|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Optional FullCalendar.io settings for this event
     *
     * @return array
     */
    public function getEventOptions()
    {
        return [
            'color' => $this->background_color,
        ];
    }
}
