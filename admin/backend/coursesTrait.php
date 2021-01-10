<?php

/**
 * Get course requests
 * return course requests
 */
trait coursesTrait
{
    
    public static function checkCourseRequests($courseId)
    {
        global $cont;

        $courseRequests = $cont->prepare(
            'SELECT * FROM requests WHERE course_id  = ?'
        );
        $courseRequests->execute([$courseId]);

        return $courseRequests;
    }

}
