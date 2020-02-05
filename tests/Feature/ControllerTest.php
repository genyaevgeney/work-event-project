<?php

namespace Tests\Feature;

use Tests\TestCase;

class ControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testArticleController()
    {
        $isSuccessfulTest = true;
        $statusArr = [];
        $data = [
                'title' => 'testTitle',
                'subtitle' => 'testSubtitle',
                'content' => 'testContent'
            ];
        $responseCreate = $this->json('POST', '/api/articles', $data);
        $createStatus = $responseCreate->getStatusCode();
        array_push($statusArr, $createStatus);
        $responsePaginate = $this->json('GET', '/api/articles/{article}?page=1');
        $paginateStatus = $responsePaginate->getStatusCode();
        array_push($statusArr, $paginateStatus);
        $articleId = $responsePaginate->decodeResponseJson()['data'][0]['id'];
        $responseGetById = $this->json('GET', "/api/articles/$articleId/edit");
        $getByIdStatus = $responseGetById->getStatusCode();
        array_push($statusArr, $getByIdStatus);
        $updateData = [
                'title' => 'updateTestTitle',
                'subtitle' => 'updateTestSubtitle',
                'content' => 'updateTestContent',
                '_method' => 'put'
            ];
        $responseUpdate = $this->json('POST', "/api/articles/$articleId", $updateData);
        $updateStatus = $responseUpdate->getStatusCode();
        array_push($statusArr, $updateStatus);
        $responseDelete = $this->json('DELETE', "/api/articles/$articleId");
        $deleteStatus = $responseDelete->getStatusCode();
        array_push($statusArr, $deleteStatus);
        foreach ($statusArr as $value) {
            if ($value != 200) {
                $isSuccessfulTest = false;
                break;
            }
        }
        $this->assertTrue($isSuccessfulTest);
    }
}
