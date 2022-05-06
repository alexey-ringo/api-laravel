<?php

namespace App\Http\Controllers\V1;

use App\Contracts\AuthorizeInterface;
use App\Exceptions\ApiLogicalException;
use App\Exceptions\ApiPermissionDeniedException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *    title="Nushnapomosh API",
 *    version="1.0.0",
 * )
 *
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      in="header",
 *      name="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 * ),
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const AUTH_CODE_SEND_CODE = 'auth-send_code';
    const AUTH_CODE_SEND_CODE_NO_DELAY = 'auth-send_code_no_delay';
    const AUTH_CODE_SEND_EMAIL_CODE = 'auth-code-send_email_code';
    const AUTH_CODE_SEND_PHONE_CODE = 'auth-code-send_phone_code';
    const AUTH_CODE_LOGIN_WITH_EMAIL_CODE = 'auth-code-login_with_email_code';
    const AUTH_CODE_LOGIN_WITH_PHONE_CODE = 'auth-code-login_with_phone_code';
    const AUTH_USER_LIST_USERS_BY_IDS = 'auth-user-list_users_by_ids';

    const CRM_PAYMENT_SEARCH = 'crm-payment-search';
    const CRM_PAYMENT_STATS = 'crm-payment-stats';
    const CRM_REPORT_ANNUAL_USER_REPORT = 'crm-report-annual_user_report';
    const CRM_COUNTERPARTY_STORE = 'crm-store-counterparty';
    const CRM_COUNTERPARTY_SHOW = 'crm-show-counterparty';
    const CRM_COUNTERPARTY_SEARCH = 'crm-search-counterparty';
    const CRM_COUNTERPARTY_SUBSCRIPTION_UPGRADE = 'crm-counterparty-subscription_upgrade';
    const CRM_COUNTERPARTY_ATTACH = 'crm-counterparty-attach';
    const CRM_COUNTERPARTY_SYNC = 'crm-counterparty-sync';
    const CRM_COUNTERPARTY_UPDATE_SUBSCRIPTION_UPGRADE = 'crm-counterparty-update_subscription_upgrade';

    const TAKIEDELA_GET_DONATE_REPORTS = 'takiedela-get_donate_reports';
    const TAKIEDELA_SET_DONATE_REPORT = 'takiedela-set_donate_report';
    const TAKIEDELA_POST_POSTS_COUNT_BY_CASE = 'takiedela-post-posts_count_by_case';

    const TOCHNOST_ORGANIZATION_SHOW_ORGANIZATION = 'tochnost-organization-show_organization';
    const TOCHNOST_ORGANIZATION_COUNT_ORGANIZATIONS = 'tochnost-organization-count_organizations';
    const TOCHNOST_ORGANIZATION_SEARCH_ORGANIZATIONS = 'tochnost-organization-search_organizations';
    const TOCHNOST_ORGANIZATION_VERIFY_FUNDS = 'tochnost-organization-verify_funds';
    const TOCHNOST_ORGANIZATION_CLIENTS_SEARCH_ORGANIZATIONS = 'tochnost-organization-clients_search_organizations';
    const TOCHNOST_ORGANIZATION_SEARCH_PROBLEMS_ORGANIZATIONS = 'tochnost-organization-search_problems_organizations';
    const TOCHNOST_ORGANIZATION_SEARCH_ORGANIZATIONS_EXTENDED = 'tochnost-organization-search_organizations_extended';
    const TOCHNOST_LIST_LIST_CATEGORY = 'tochnost-list-list_category';

    const PAY_OFFICE_INDEX_SIGNUPS = 'pay-office-index_signups';
    const PAY_OFFICE_INDEX_PAYMENTS = 'pay-office-payments_data';
    const PAY_OFFICE_SHOW_USER_METRICS = 'pay-office-show_user_metrics';
    const PAY_OFFICE_SHOW_MATCHING_ORGANIZATION = 'pay-office-show_matching_organization';
    const PAY_OFFICE_INDEX_MATCHING_CAMPAIGNS = 'pay-office-index_matching_campaigns';
    const PAY_OFFICE_CREATE_MATCHING_ORGANIZATION = 'pay-office-create_matching_organization';
    const PAY_OFFICE_SET_MATCHING_ORGANIZATION = 'pay-office-set_matching_organization';
    const PAY_OFFICE_CREATE_MATCHING_CAMPAIGN = 'pay-office-create_matching_campaign';
    const PAY_OFFICE_ACTIVATE_GIFT_CARD = 'pay-office-activate_gift_card';
    const PAY_OFFICE_HISTORY_GIFT_CARDS = 'pay-office-history_gift_cards';
    const PAY_OFFICE_INVOICE = 'pay-office-invoice';
    const PAY_OFFICE_BALANCE_MATCHING_CAMPAIGN = 'pay-office-balance_matching_campaign';
    const PAY_CLOUD_PAYMENT_CREATE = 'pay-cloud_payment-create';
    const PAY_CLOUD_PAYMENT_UPDATE = 'pay-cloud_payment-update';
    const PAY_CLOUD_PAYMENT_UPDATE_COMMISSION = 'pay-cloud_payment-update_commission';
    const PAY_CLOUD_PAYMENT_DEACTIVATE = 'pay-cloud_payment-deactivate';
    const PAY_CLOUD_PAYMENT_RESTORE = 'pay-cloud_payment-restore';
    const PAY_CLOUD_PAYMENT_TOKEN = 'pay-cloud_payment_token';
    const PAY_CARD_LINKED_CARDS_BY_USER_TOKEN = 'pay-linked_cards';
    const PAY_CARD_LINKED_CARDS_BY_ID = 'pay-linked_cards-by-id';
    const PAY_CARD_CREATE_CARD = 'pay-card-create_card';
    const PAY_CARD_DELETE_CARD = 'pay-card-delete_card';
    const PAY_CARD_SET_MAIN_CARD = 'pay-card-set_main_card';
    const PAY_PAYMENT_LIST_PAYMENTS_BY_IDS = 'pay-payment-list_payments_by_ids';

    const PAY_YOOKASSA_CREATE_YOOKASSA = 'pay-yookassa';
    const PAY_YOOKASSA_UPDATE_YOOKASSA = 'pay-yookassa-update_yookassa';
    const PAY_YOOKASSA_DELETE_YOOKASSA = 'pay-yookassa-delete_yookassa';
    const PAY_YOOKASSA_RESTORE_YOOKASSA = 'pay-yookassa-restore_yookassa';

    const SLUCHAEM_CASE_INDEX_CASES = 'sluchaem-index_cases';
    const SLUCHAEM_CASE_INDEX_CROWDFUNDING = 'sluchaem-case-index_crowdfunding';

    const EDU_USERS_INDEX_USERS_TEACHERS = 'edu-users-index_users_teachers';
    const EDU_COURSE_SEARCH_COURSE_BY_URL = 'edu-course-search_course_by_url';

    const COMMENTS_COMMENT_INDEX = 'comments-comment-index';
    const COMMENTS_COMMENT_GET_BY_DONATION_ID = 'comments-comment-get-by-donation-id';
    const COMMENTS_COMMENT_CREATE = 'comments-comment-create';
    const COMMENTS_COMMENT_THREAD = 'comments-comment-thread';
    const COMMENTS_COMMENT_UPDATE = 'comments-comment-update';
    const COMMENTS_COMMENT_DELETE = 'comments-comment-delete';

    const CORE_FUND_INDEX = 'core-fund-index';
    const CORE_FUND_SHOW = 'core-fund-show';
    const CORE_CASE_INDEX = 'core-case-index';
    const CORE_CASE_SHOW = 'core-case-show';

    /**
     * @param string|string[] $permission
     *
     * @return void
     * @throws ApiPermissionDeniedException
     */
    protected function authorizeToken($permission)
    {
        /** @var AuthorizeInterface $client */
        $client = auth()->user();
        if (! $client->checkTokenPermissions($permission)) {
            throw new ApiPermissionDeniedException('Permission denied to this API method');
        }
    }
}
