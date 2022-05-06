<?php

namespace App\Http\Controllers\V1\Tochnost;

use App\Domains\Tochnost\Actions\ClientsSearchOrganizationsTochnostAction;
use App\Domains\Tochnost\Actions\CountOrganizationsTochnostAction;
use App\Domains\Tochnost\Actions\SearchOrganizationsExtendedTochnostAction;
use App\Domains\Tochnost\Actions\SearchOrganizationsTochnostAction;
use App\Domains\Tochnost\Actions\SearchProblemsOrganizationsTochnostAction;
use App\Domains\Tochnost\Actions\ShowOrganizationTochnostAction;
use App\Domains\Tochnost\Dto\Request\ClientsSearchOrganizationsTochnostRequestDto;
use App\Domains\Tochnost\Dto\Request\SearchOrganizationsExtendedTochnostRequestDto;
use App\Domains\Tochnost\Dto\Request\SearchOrganizationsTochnostRequestDto;
use App\Domains\Tochnost\Dto\Request\SearchProblemsOrganizationsTochnostRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Exceptions\ApiPermissionDeniedException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Tochnost\ClientsSearchOrganizationsTochnostRequest;
use App\Http\Requests\Tochnost\SearchOrganizationsExtendedTochnostRequest;
use App\Http\Requests\Tochnost\SearchOrganizationsTochnostRequest;
use App\Http\Requests\Tochnost\SearchProblemsOrganizationsTochnostRequest;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\NoWrapResource;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class OrganizationController extends Controller
{
    const VERIFY_FUNDS = 'tochnost-verify_funds';
    const SEARCH = 'tochnost-search_organizations';
    const COUNT = 'tochnost-count_organizations';
    const SHOW = 'tochnost-show_organization';

    /**
     * Show organization by INN from Tochnost Service.
     *
     * @OA\Get(
     *     path="/tochnost/organizations/show/{inn}",
     *     operationId="showOrganization",
     *     tags={"Tochnost"},
     *     summary="Show organization by INN from Tochnost Service",
     *     description="Returns requested Yookassa payment status",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="inn",
     *          description="INN number",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/ShowOrganizationTochnostResponseDto"
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws ApiPermissionDeniedException
     */
    public function showOrganization(int $inn, ShowOrganizationTochnostAction $action)
    {
        $this->authorizeToken(self::TOCHNOST_ORGANIZATION_SHOW_ORGANIZATION);
        $resourceResponseDto = $action->run($inn);

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Count verify and active funds from Tochnost Service.
     *
     * @OA\Get(
     *     path="/tochnost/organizatios/count",
     *     operationId="countOrganizations",
     *     tags={"Tochnost"},
     *     summary="Count verify and active organization from Tochnost Service",
     *     description="Count verify and active organization from Tochnost Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/CountOrganizationsTochnostResponseDto"
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws ApiPermissionDeniedException
     */
    public function countOrganizations(CountOrganizationsTochnostAction $action)
    {
        $this->authorizeToken(self::TOCHNOST_ORGANIZATION_COUNT_ORGANIZATIONS);
        $resourceResponseDto = $action->run();

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Search organizations into Tochnost Service.
     *
     * @OA\Get(
     *     path="/tochnost/organizations/search",
     *     operationId="swarchOrganizations",
     *     tags={"Tochnost"},
     *     summary="Search organizations into Tochnost Service",
     *     description="Search organizations into Tochnost Service",
     *     security={{"bearerAuth":{}}},
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
     *         @OA\Schema(type="boolean"),
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
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/SearchOrganizationsTochnostResponseDto")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ValidationException
     * @throws ApiPermissionDeniedException
     */
    public function searchOrganizations(SearchOrganizationsTochnostRequest $request, SearchOrganizationsTochnostAction $action)
    {
        $this->authorizeToken(self::TOCHNOST_ORGANIZATION_SEARCH_ORGANIZATIONS);
        $dto = new SearchOrganizationsTochnostRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Search verify funds from Tochnost Service.
     *
     * @OA\Get(
     *     path="/tochnost/organizations/verify-funds",
     *     operationId="swarchVerifyFunds",
     *     tags={"Tochnost"},
     *     summary="Search verify funds from Tochnost Service",
     *     description="Returns verify funds search results",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/SearchOrganizationsTochnostResponseDto")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ValidationException
     * @throws ApiPermissionDeniedException
     */
    public function verifyFunds(Request $request, SearchOrganizationsTochnostAction $action)
    {
        $this->authorizeToken(self::TOCHNOST_ORGANIZATION_VERIFY_FUNDS);
        $dto = new SearchOrganizationsTochnostRequestDto(is_verify: true, page: $request->input('page'));
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Search organizations from Tochnost Service.
     *
     * @OA\Get(
     *     path="/tochnost/clients/organizations/search",
     *     operationId="searchOrganizationsForClient",
     *     tags={"Tochnost"},
     *     summary="Search organizations from Tochnost Service",
     *     description="Returns search organizarions results",
     *     security={{"bearerAuth":{}}},
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
     *         name="limit",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="offset",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/ClientsSearchOrganizationsTochnostResponseDataDto"),
     *             ),
     *             @OA\Property(
     *                 property="total",
     *                 type="integer",
     *                 example="12",
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ValidationException
     * @throws ApiPermissionDeniedException
     */
    public function clientsSearchOrganizations(ClientsSearchOrganizationsTochnostRequest $request, ClientsSearchOrganizationsTochnostAction $action)
    {
        $this->authorizeToken(self::TOCHNOST_ORGANIZATION_CLIENTS_SEARCH_ORGANIZATIONS);
        $dto = new ClientsSearchOrganizationsTochnostRequestDto($request->validated());
        $dto->type = ClientsSearchOrganizationsTochnostAction::CLIENTS_TYPE;
        $resourceCollectionDto = $action->run($dto);

        return DefaultResource::collection($resourceCollectionDto->collectionDto)
            ->additional(['total' => $resourceCollectionDto->total])
            ->response()->setStatusCode($resourceCollectionDto->statusCode);
    }

    /**
     * Search organizations with problems from Tochnost Service.
     *
     * @OA\Get(
     *     path="/tochnost/organizations/problems",
     *     operationId="searchProblemsOrganizations",
     *     tags={"Tochnost"},
     *     summary="Search organizations with problems from Tochnost Service",
     *     description="Search organizations with problems from Tochnost Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="inn",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="ogrn",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="kpp",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="full_name",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="problems",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="array", @OA\Items()),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/SearchProblemsOrganizationsTochnostResponseDataDto"),
     *             ),
     *             @OA\Property(
     *                 property="total",
     *                 type="integer",
     *                 example="12",
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ApiPermissionDeniedException
     */
    public function searchProblemsOrganizations(SearchProblemsOrganizationsTochnostRequest $request, SearchProblemsOrganizationsTochnostAction $action)
    {
        $this->authorizeToken(self::TOCHNOST_ORGANIZATION_SEARCH_PROBLEMS_ORGANIZATIONS);
        $dto = new SearchProblemsOrganizationsTochnostRequestDto($request->validated());
        $dto->type = SearchProblemsOrganizationsTochnostAction::NP_SERVICE;
        $resourceCollectionDto = $action->run($dto);

        return DefaultResource::collection($resourceCollectionDto->collectionDto)
            ->additional(['total' => $resourceCollectionDto->total])
            ->response()->setStatusCode($resourceCollectionDto->statusCode);
    }

    /**
     * Search organizations extended from Tochnost Service.
     *
     * @OA\Get(
     *     path="/tochnost/organizations/search/extended",
     *     operationId="searchOrganizationsExtebded",
     *     tags={"Tochnost"},
     *     summary="Search organizations extended from Tochnost Service",
     *     description="Search organizations extended from Tochnost Service",
     *     security={{"bearerAuth":{}}},
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
     *         name="problem_path_group",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="array", @OA\Items()),
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
     *         name="is_np_verify",
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
     *         name="object_help_first_group",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="array", @OA\Items()),
     *     ),
     *     @OA\Parameter(
     *         name="object_help_second",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="object_help_second_group",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="array", @OA\Items()),
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
     *         name="type_of_help_group",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="array", @OA\Items()),
     *     ),
     *     @OA\Parameter(
     *         name="type_of_nko",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer"),
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
     *         name="income_source",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="inns",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="array", @OA\Items()),
     *     ),
     *     @OA\Parameter(
     *         name="is_charity",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="boolean"),
     *     ),
     *     @OA\Parameter(
     *         name="income_source_slug",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="offset",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/OrganizationExtendedCollectionTochnostResponseDto"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws ApiPermissionDeniedException
     */
    public function searchOrganizationsExtended(SearchOrganizationsExtendedTochnostRequest $request, SearchOrganizationsExtendedTochnostAction $action)
    {
        $this->authorizeToken(self::TOCHNOST_ORGANIZATION_SEARCH_ORGANIZATIONS_EXTENDED);
        $dto = new SearchOrganizationsExtendedTochnostRequestDto($request->validated());
        $dto->type = 'td';
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
