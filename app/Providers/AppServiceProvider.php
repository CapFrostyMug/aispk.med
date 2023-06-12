<?php

namespace App\Providers;

use App\Queries\DecreeQueryBuilder;
use App\Queries\EdDocTypeQueryBuilder;
use App\Queries\EdInstitutionTypeQueryBuilder;
use App\Queries\EducationalQueryBuilder;
use App\Queries\EnrollmentQueryBuilder;
use App\Queries\FacultyQueryBuilder;
use App\Queries\FinancingQueryBuilder;
use App\Queries\LanguageQueryBuilder;
use App\Queries\NationalityQueryBuilder;
use App\Queries\PassportQueryBuilder;
use App\Queries\SeniorityQueryBuilder;
use App\Queries\SpecialCircumstanceQueryBuilder;
use App\Queries\StParentFatherQueryBuilder;
use App\Queries\StParentMotherQueryBuilder;
use App\Queries\StudentQueryBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(NationalityQueryBuilder::class);
        $this->app->bind(FacultyQueryBuilder::class);
        $this->app->bind(FinancingQueryBuilder::class);
        $this->app->bind(EdInstitutionTypeQueryBuilder::class);
        $this->app->bind(LanguageQueryBuilder::class);
        $this->app->bind(EdDocTypeQueryBuilder::class);
        $this->app->bind(SpecialCircumstanceQueryBuilder::class);
        $this->app->bind(DecreeQueryBuilder::class);

        $this->app->bind(PassportQueryBuilder::class);
        $this->app->bind(StudentQueryBuilder::class);
        $this->app->bind(EducationalQueryBuilder::class);
        $this->app->bind(SeniorityQueryBuilder::class);
        $this->app->bind(StParentFatherQueryBuilder::class);
        $this->app->bind(StParentMotherQueryBuilder::class);
        $this->app->bind(EnrollmentQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
