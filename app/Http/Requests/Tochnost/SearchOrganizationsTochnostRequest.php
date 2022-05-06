<?php

namespace App\Http\Requests\Tochnost;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SearchOrganizationsTochnostRequest
 * @package App\Http\Requests\Tochnost
 *
 * @OA\Schema(
 *     title="Request Search Organization",
 *     description="Search Organization request query params",
 *     @OA\Parameter(
 *         name="search_text",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="string"),
 *     ),
 *     @OA\Parameter(
 *         name="problem_path",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="string"),
 *     ),
 *     @OA\Parameter(
 *         name="region_registry",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="string"),
 *     ),
 *     @OA\Parameter(
 *         name="region_path",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="string"),
 *     ),
 *     @OA\Parameter(
 *         name="is_grant_president",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="boolran"),
 *     ),
 *     @OA\Parameter(
 *         name="is_grant_potanin",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="boolean"),
 *     ),
 *     @OA\Parameter(
 *         name="is_opu",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="boolean"),
 *     ),
 *     @OA\Parameter(
 *         name="is_psu",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="boolean"),
 *     ),
 *     @OA\Parameter(
 *         name="is_covid",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="boolean"),
 *     ),
 *     @OA\Parameter(
 *         name="is_site",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="boolean"),
 *     ),
 *     @OA\Parameter(
 *         name="has_report",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="boolean"),
 *     ),
 *     @OA\Parameter(
 *         name="is_verify",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="boolean"),
 *     ),
 *     @OA\Parameter(
 *         name="foreign_agent",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="boolean"),
 *     ),
 *     @OA\Parameter(
 *         name="object_help_first",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="integer"),
 *     ),
 *     @OA\Parameter(
 *         name="object_help_second",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="integer"),
 *     ),
 *     @OA\Parameter(
 *         name="object_help_third",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="integer"),
 *     ),
 *     @OA\Parameter(
 *         name="registry_tax_deduction",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="boolean"),
 *     ),
 *     @OA\Parameter(
 *         name="type_of_help",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="integer"),
 *     ),
 *     @OA\Parameter(
 *         name="type_of_nko",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="integer"),
 *     ),
 *     @OA\Parameter(
 *         name="type",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="string"),
 *     ),
 *     @OA\Parameter(
 *         name="org_cats",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="string"),
 *     ),
 *     @OA\Parameter(
 *         name="work_year",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="string"),
 *     ),
 *     @OA\Parameter(
 *         name="is_np_verify",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="boolean"),
 *     ),
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         required=false,
 *         @OA\Schema(type="integer"),
 *     ),
 * )
 *
 */
class SearchOrganizationsTochnostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'search_text' => 'nullable|string',
            'problem_path' => 'nullable|string',
            'region_registry' => 'nullable|string',
            'region_path' => 'nullable|string',
            'is_grant_president' => 'nullable|boolean',
            'is_grant_potanin' => 'nullable|boolean',
            'is_opu' => 'nullable|boolean',
            'is_psu' => 'nullable|boolean',
            'is_covid' => 'nullable|boolean',
            'is_site' => 'nullable|boolean',
            'has_report' => 'nullable|boolean',
            'is_verify' => 'nullable|boolean',
            'foreign_agent' => 'nullable|boolean',
            'object_help_first' => 'nullable|integer',
            'object_help_second' => 'nullable|integer',
            'object_help_third' => 'nullable|integer',
            'registry_tax_deduction' => 'nullable|boolean',
            'type_of_help' => 'nullable|integer',
            'type_of_nko' => 'nullable|integer',
            'type' => 'nullable|string',
            'org_cats' => 'nullable|string',
            'work_year' => 'nullable|string',
            'is_np_verify' => 'nullable|bool',
            'page' => 'nullable|integer',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
