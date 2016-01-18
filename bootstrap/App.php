<?php

namespace Bootstrap;

class App
{
    /*
    |--------------------------------------------------------------------------
    | Main Application Model
    |--------------------------------------------------------------------------
    |
    | This is main application model used across the app.
    |
     */
    protected $configuration = array();
    protected $app           = array();

    /**
     * App constructor
     * @param array $config  App configuration variables
     * @param array $app     App spacific variables
     */
    public function __construct($configuration, $app)
    {
        $this->configuration = $configuration;
        $this->app           = $app;
    }

    /**
     * This method merges application and configuration variables
     * @return array    array of application variables
     */
    public function getAppVariables()
    {
        return array_merge($this->configuration, $this->app);
    }

    /**
     * This method gets the desired variable from app configuration
     * @param  string $variable         name of desired config variable
     * @param  array $variables         array of configuration variables
     * @param  string $desiredVariable  desired variable
     * @return string                   value of desired variable
     */
    public function getAppVariable($variable)
    {
        $variables                                                   = array_merge($this->configuration, $this->app);
        (array_key_exists($variable, $variables)) ? $desiredVariable = $variables[$variable] : $desiredVariable = null;
        return $desiredVariable;
    }
}
