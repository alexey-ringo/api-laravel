<?php

namespace App\Http\Controllers\V1\Edu;

use App\Domains\Edu\Actions\ListCourseEduAction;
use App\Domains\Edu\Actions\SearchCourseByUrlEduAction;
use App\Domains\Edu\Dto\Request\ListCourseEduRequestDto;
use App\Domains\Edu\Dto\Request\SearchCourseByUrlEduRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Exceptions\ApiPermissionDeniedException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Edu\ListCourseEduRequest;
use App\Http\Requests\Edu\SearchCourseByUrlEduRequest;
use App\Http\Resources\DefaultResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CourseController extends Controller
{
    const COURSE_LIST = 'edu-course-list';

    /**
     * List Courses by User ID or Email from EDU service
     *
     * @OA\Get(
     *     path="/edu/user/courses",
     *     tags={"Edu"},
     *     summary="List Courses by User ID or Email from EDU service",
     *     description="List Courses by User ID or Email from EDU service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/CourseEduResponseDataDto"),
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="You do not have permissions to join this game!",
     *             ),
     *         ),
     *     ),
     * )
     *
     *
     * @return JsonResponse|object
     * @throws ApiLogicalException
     * @throws UnknownProperties|ValidationException
     */
    public function listUserCourses(ListCourseEduRequest $request, ListCourseEduAction $action)
    {
        $this->authorizeToken(self::COURSE_LIST);
        $dto = new ListCourseEduRequestDto($request->validated());
        $resourceCollectionDto = $action->run($dto);

        return DefaultResource::collection($resourceCollectionDto->collectionDto)
            ->response()->setStatusCode($resourceCollectionDto->statusCode);
    }

    /**
     * Show course, finding by url from EDU service
     *
     * @OA\Get(
     *     path="/edu/courses/search-by-url",
     *     tags={"Edu"},
     *     summary="Show course, finding by url from EDU service",
     *     description="Show course, finding by url from EDU service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="url",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/CourseLandingEduResponseDataDto"
     *             ),
     *             @OA\Property(
     *                 property="total",
     *                 type="integer",
     *                 example="34",
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="You do not have permissions to join this game!",
     *             ),
     *         ),
     *     ),
     * )
     *
     *
     * @return JsonResponse|object
     * @throws UnknownProperties|ApiPermissionDeniedException
     */
    public function searchCourseByUrl(SearchCourseByUrlEduRequest $request, SearchCourseByUrlEduAction $action)
    {
        $this->authorizeToken(self::EDU_COURSE_SEARCH_COURSE_BY_URL);
        $dto = new SearchCourseByUrlEduRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
