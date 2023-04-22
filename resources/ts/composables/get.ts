export default function useFetchGet(url, data)
{
    if (url === '/customerOrder') {
        return new Promise<JSON>((resolve, reject) => {
            if (data.workOrderItem === 1 ||
                data.workOrderItem === 2 ||
                data.workOrderItem === 3 ) {
                setTimeout(() => {
                    resolve(JSON.stringify({
                        id: 1,
                        workOrders: [
                            {
                                id: 1,
                                workOrderItems: [
                                    {
                                        id: 1,
                                        workflowState: 'ready',
                                        workOrder: 1
                                    },
                                ],
                                workflowState: 'ready',
                                fromFirstName: 'Calvin',
                                fromLastName: 'Hill',
                                fromAddress1: '111 Fake Street',
                                fromAddress2: '',
                                fromCity: 'Tallahassee',
                                fromZip: '32301',
                                fromState: 'FL',
                                toFirstName: 'Gerald',
                                toLastName: 'Greene',
                                toAddress1: '222 DoubleTree Lane',
                                toAddress2: '',
                                toCity: 'Asheville',
                                toZip: '87291',
                                toState: 'NC',
                                manufacturerProductVariation: {
                                    manufacturerProduct: {
                                        id: 1,
                                        name: 't-shirt',
                                    },
                                    color: {
                                        id: 1,
                                        name: 'white'
                                    },
                                    size: {
                                        id: 1,
                                        name: 'large'
                                    },
                                },
                                media: {
                                    id: 1,
                                    originalUrl: 'https://bucketeer-a75cc2de-3623-44af-95fe-68274d8a91cd.s3.amazonaws.com/img/media/DP-17451-001.jpg',
                                    thumbnailUrl: 'https://bucketeer-a75cc2de-3623-44af-95fe-68274d8a91cd.s3.amazonaws.com/img/thumbnails/7.jpg',
                                },
                                account: {
                                    id: 1,
                                    name: 'Heritage Shipping Company'
                                },
                                requestedShippingMethod: 224,
                            },
                            {
                                id: 2,
                                workOrderItems: [
                                    {
                                        id: 2,
                                        workflowState: 'ready',
                                        workOrder: 2
                                    },
                                ],
                                workflowState: 'ready',
                                fromFirstName: 'Calvin',
                                fromLastName: 'Hill',
                                fromAddress1: '111 Fake Street',
                                fromAddress2: '',
                                fromCity: 'Tallahassee',
                                fromZip: '32301',
                                fromState: 'FL',
                                toFirstName: 'Gerald',
                                toLastName: 'Greene',
                                toAddress1: '222 DoubleTree Lane',
                                toAddress2: '',
                                toCity: 'Asheville',
                                toZip: '87291',
                                toState: 'NC',
                                manufacturerProductVariation: {
                                    manufacturerProduct: {
                                        id: 1,
                                        name: 't-shirt',
                                    },
                                    color: {
                                        id: 1,
                                        name: 'white'
                                    },
                                    size: {
                                        id: 1,
                                        name: 'large'
                                    },
                                },
                                media: {
                                    id: 2,
                                    originalUrl: 'https://bucketeer-a75cc2de-3623-44af-95fe-68274d8a91cd.s3.amazonaws.com/img/media/DP233702.jpg',
                                    thumbnailUrl: 'https://bucketeer-a75cc2de-3623-44af-95fe-68274d8a91cd.s3.amazonaws.com/img/thumbnails/29.jpg',
                                },
                                account: {
                                    id: 1,
                                    name: 'Heritage Shipping Company'
                                },
                                requestedShippingMethod: 224,
                            },
                            {
                                id: 3,
                                workOrderItems: [
                                    {
                                        id: 3,
                                        workflowState: 'ready',
                                        workOrder: 3
                                    },
                                ],
                                workflowState: 'ready',
                                fromFirstName: 'Calvin',
                                fromLastName: 'Hill',
                                fromAddress1: '111 Fake Street',
                                fromAddress2: '',
                                fromCity: 'Tallahassee',
                                fromZip: '32301',
                                fromState: 'FL',
                                toFirstName: 'Gerald',
                                toLastName: 'Greene',
                                toAddress1: '222 DoubleTree Lane',
                                toAddress2: '',
                                toCity: 'Asheville',
                                toZip: '87291',
                                toState: 'NC',
                                manufacturerProductVariation: {
                                    manufacturerProduct: {
                                        id: 1,
                                        name: 't-shirt',
                                    },
                                    color: {
                                        id: 1,
                                        name: 'white'
                                    },
                                    size: {
                                        id: 1,
                                        name: 'large'
                                    },
                                },
                                media: {
                                    id: 2,
                                    originalUrl: 'https://bucketeer-a75cc2de-3623-44af-95fe-68274d8a91cd.s3.amazonaws.com/img/media/DP-1740-001_cropped.jpg',
                                    thumbnailUrl: 'https://bucketeer-a75cc2de-3623-44af-95fe-68274d8a91cd.s3.amazonaws.com/img/thumbnails/6.jpg',
                                },
                                account: {
                                    id: 1,
                                    name: 'Heritage Shipping Company'
                                },
                                requestedShippingMethod: 224,
                            }
                        ],

                    }))
                }, 75)
            } else {
                reject(JSON.stringify({
                    'error': 'Work order item not found',
                }));
            }
        })
    } else {
        return fetch(url, data);

    }


}

