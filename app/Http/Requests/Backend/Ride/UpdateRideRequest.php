<?php
/**
 * Created by PhpStorm.
 * User: phuong
 * Date: 10/14/2016
 * Time: 12:46 PM
 */

namespace App\Http\Requests\Backend\Ride;

use App\Http\Requests\Request;

class UpdateRideRequest extends  Request{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {


        return [
            'name'                  => 'required',
            'description'           => 'required'
        ];
    }
}