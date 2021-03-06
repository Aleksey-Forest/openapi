<?php

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Joli\Jane\OpenApi\Tests\Expected\Resource;

use Joli\Jane\OpenApi\Runtime\Client\QueryParam;
use Joli\Jane\OpenApi\Runtime\Client\Resource;

class SwarmResource extends Resource
{
    /**
     * @param \Joli\Jane\OpenApi\Tests\Expected\Model\SwarmInitBody $body
     * @param array                                                 $parameters List of parameters
     * @param string                                                $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function swarmInit(\Joli\Jane\OpenApi\Tests\Expected\Model\SwarmInitBody $body, $parameters = [], $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url        = '/v1.30/swarm/init';
        $url        = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers    = array_merge(['Host' => 'localhost', 'Accept' => ['application/json'], 'Content-Type' => 'application/json'], $queryParam->buildHeaders($parameters));
        $body       = $this->serializer->serialize($body, 'json');
        $request    = $this->messageFactory->createRequest('POST', $url, $headers, $body);
        $promise    = $this->httpClient->sendAsyncRequest($request);
        if (self::FETCH_PROMISE === $fetch) {
            return $promise;
        }
        $response = $promise->wait();
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return null;
            }
        }

        return $response;
    }
}
