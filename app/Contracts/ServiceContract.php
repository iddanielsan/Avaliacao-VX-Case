<?php

namespace App\Contracts;

interface ServiceContract
{
    /**
     * @return mixed
     */
    public function index($request);

    /**
     * @param $id
     * @return mixed
     */
    public function showById($id);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function updateById($data, $id);

    /**
     * @param $data
     * @return mixed
     */
    public function store($data);

    /**
     * @param $id
     * @return mixed
     */
    public function destroyById($id);


}