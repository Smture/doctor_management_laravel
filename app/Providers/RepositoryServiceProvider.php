<?php

namespace App\Providers;

use App\Repositories\Appointment\AppointmentRepository;
use App\Repositories\MySql\Appointment\AppointmentRepositoryImplementation;
use App\Repositories\MySql\TimeSlot\TimeSlotRepositoryImplementation;
use App\Repositories\MySql\User\UserRepositoryImplementation;
use App\Repositories\TimeSlot\TimeSlotRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mapMySqlRepositoryProviders();
    }

    /**
     * MySql Database repository providers
     */
    public function mapMySqlRepositoryProviders()
    {
        $this->app->bind(BaseRepository::class, MySqlBaseRepository::class);
        $this->app->bind(UserRepository::class, UserRepositoryImplementation::class);
        $this->app->bind(AppointmentRepository::class, AppointmentRepositoryImplementation::class);
        $this->app->bind(TimeSlotRepository::class, TimeSlotRepositoryImplementation::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
