<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @Entity
 * @Table(name="tracking_user")
 */
class TrackingUser {

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $tracking_user_id;

    /**
     * @ManyToOne(targetEntity="UserInfo")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @Column(length=100)
     */
    private $ip_address;

    function getTracking_user_id() {
        return $this->tracking_user_id;
    }

    function setTracking_user_id($tracking_user_id) {
        $this->tracking_user_id = $tracking_user_id;
    }

    function getUser() {
        return $this->user;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function getIp_address() {
        return $this->ip_address;
    }

    function setIp_address($ip_address) {
        $this->ip_address = $ip_address;
    }

}
