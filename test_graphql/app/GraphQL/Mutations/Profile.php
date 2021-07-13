<?php

namespace App\GraphQL\Mutations;

use App\Models\ProfilesModel;
use GrahamCampbell\ResultType\Result;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Profile
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }

    public function createProfile($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $credentials = Arr::only($args, ['first_name', 'last_name','address']);

        $profile = DB::table('profiles')->insert([
            'first_name'=>$credentials['first_name'],
            'last_name'=>$credentials['last_name'],
            'address'=>$credentials['address'],
        ]);
        $result = DB::table('profiles')
        ->where('first_name',$credentials['first_name'])->get()->first();
        return [
            'status'=>'true',
            'Profile'=>$result
        ];
    }
}
