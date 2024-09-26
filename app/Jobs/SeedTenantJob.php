<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Site;
use App\Models\Site\User;
use App\Models\Role;


class SeedTenantJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    protected $site;
    public function __construct(Site $site)
    {
        $this->site=$site;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->site->run(function(){
            $user = User::create([
                'name' => $this->site->siteadmin->name,
                'email' => $this->site->siteadmin->email,
                'password' => $this->site->siteadmin->password,
            ]);
            Role::create([
                'name'=> 'Admin',
                'guard_name'=>'web',
            ]);
            Role::create([
                'name'=>'Driver',
                'guard_name'=>'web',
            ]);
            $user->assignRole('Admin');

        });


    }
}
