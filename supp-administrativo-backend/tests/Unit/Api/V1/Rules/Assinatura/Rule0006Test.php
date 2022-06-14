<?php

declare(strict_types=1);
/**
 * /tests/Unit/Api/V1/Rules/Assinatura/Rule0006Test.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Assinatura;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SuppCore\AdministrativoBackend\Api\V1\DTO\Assinatura as AssinaturaDto;
use SuppCore\AdministrativoBackend\Api\V1\Resource\ComponenteDigitalResource;
use SuppCore\AdministrativoBackend\Api\V1\Rules\Assinatura\Rule0006;
use SuppCore\AdministrativoBackend\Entity\Assinatura as AssinaturaEntity;
use SuppCore\AdministrativoBackend\Entity\ComponenteDigital;
use SuppCore\AdministrativoBackend\Rules\Exceptions\RuleException;
use SuppCore\AdministrativoBackend\Rules\RuleInterface;
use SuppCore\AdministrativoBackend\Rules\RulesTranslate;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class Rule0006Test.
 *
 * @package SuppCore\AdministrativoBackend\Tests\Unit\Api\V1\Rules\Assinatura;
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class Rule0006Test extends TestCase
{
    private MockObject|AssinaturaDto $assinaturaDto;

    private MockObject|AssinaturaEntity $assinaturaEntity;

    private MockObject|ComponenteDigital $componenteDigital;

    private MockObject|ComponenteDigitalResource $componenteDigitalResource;

    private MockObject|ParameterBagInterface $parameterBag;

    private MockObject|RulesTranslate $rulesTranslate;

    private RuleInterface $rule;

    public function setUp(): void
    {
        parent::setUp();

        $this->assinaturaDto = $this->createMock(AssinaturaDto::class);
        $this->assinaturaEntity = $this->createMock(AssinaturaEntity::class);
        $this->componenteDigital = $this->createMock(ComponenteDigital::class);
        $this->componenteDigitalResource = $this->createMock(ComponenteDigitalResource::class);
        $this->parameterBag = $this->createMock(ParameterBagInterface::class);
        $this->rulesTranslate = $this->createMock(RulesTranslate::class);

        $this->rule = new Rule0006(
            $this->parameterBag,
            $this->rulesTranslate,
            $this->componenteDigitalResource,
        );
    }

    public function testAssinaturaPkcs7Invalida(): void
    {
        $this->parameterBag->expects(self::once())
            ->method('get')
            ->willReturn('--proxyHost=0.0.0.0 --proxyPort=422');

        $this->componenteDigital->expects(self::once())
            ->method('getHash')
            ->willReturn('TESTE');

        $this->assinaturaDto->expects(self::once())
            ->method('getAssinatura')
            ->willReturn('MIAGCSqGSIb3DQEHAg==VEVTVEVDRVJUSUZJQ0FET0FTU0lOQVRVUkE');

        $this->assinaturaDto->expects(self::once())
            ->method('getComponenteDigital')
            ->willReturn($this->componenteDigital);

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->rule->validate($this->assinaturaDto, $this->assinaturaEntity, 'transaction');
    }

    public function testAssinaturaInvalidaSha256(): void
    {
        $this->componenteDigital->expects(self::once())
            ->method('getConteudo')
            ->willReturn('TESTE');

        $this->assinaturaDto->expects(self::once())
            ->method('getAssinatura')
            ->willReturn('+AI6Y5cdSNgLP4FHTGQzV2OY6E=');

        $this->assinaturaDto->expects(self::exactly(2))
            ->method('getComponenteDigital')
            ->willReturn($this->componenteDigital);

        $this->assinaturaDto->expects(self::exactly(2))
            ->method('getCadeiaCertificadoPEM')
            ->willReturn(<<<EOF
                            -----BEGIN PUBLIC KEY-----
                            MFwwDQYJKoZIhvcNAQEBBQADSwAwSAJBALlTDydScYiT4dao0MJrvUlMkdP31W9c
                            fviaiGppbYsfwLWD5HiGBGBgf4Do0yhKjXXkR37vfOVYBTvSuVf18xMCAwEAAQ==
                            -----END PUBLIC KEY-----
                            -----BEGIN CERTIFICATE-----
                            MIICFTCCAX4CAgECMA0GCSqGSIb3DQEBBAUAMFcxCzAJBgNVBAYTAlVTMRMwEQYD
                            VQQKEwpSVEZNLCBJbmMuMRkwFwYDVQQLExBXaWRnZXRzIERpdmlzaW9uMRgwFgYD
                            -----END CERTIFICATE-----
                            EOF);

        $this->assinaturaDto->expects(self::once())
            ->method('getAlgoritmoHash')
            ->willReturn('SHA256WITHRSA');

        $this->assinaturaDto->expects(self::exactly(2))
            ->method('getComponenteDigital')
            ->willReturn($this->componenteDigital);

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->rule->validate($this->assinaturaDto, $this->assinaturaEntity, 'transaction');
    }

    /**
     * @throws RuleException
     */
    public function testAssinaturaValidaSha256(): void
    {
        $this->componenteDigital->expects(self::once())
            ->method('getConteudo')
            ->willReturn('TESTE');

        $this->assinaturaDto->expects(self::once())
            ->method('getAssinatura')
            ->willReturn('IxPaZT5UZ8SbrhX2ywYaIPA/2LU7LXDRGPSU2wykdcbkV70n+EOvu0nwzRWCs+9/O0LHPueP+NgyeIWeYbE/mQ==');

        $this->assinaturaDto->expects(self::exactly(2))
            ->method('getComponenteDigital')
            ->willReturn($this->componenteDigital);

        $this->assinaturaDto->expects(self::exactly(2))
            ->method('getCadeiaCertificadoPEM')
            ->willReturn(<<<EOF
                            -----BEGIN PUBLIC KEY-----
                            MFwwDQYJKoZIhvcNAQEBBQADSwAwSAJBALlTDydScYiT4dao0MJrvUlMkdP31W9c
                            fviaiGppbYsfwLWD5HiGBGBgf4Do0yhKjXXkR37vfOVYBTvSuVf18xMCAwEAAQ==
                            -----END PUBLIC KEY-----
                            -----BEGIN CERTIFICATE-----
                            MIICFTCCAX4CAgECMA0GCSqGSIb3DQEBBAUAMFcxCzAJBgNVBAYTAlVTMRMwEQYD
                            VQQKEwpSVEZNLCBJbmMuMRkwFwYDVQQLExBXaWRnZXRzIERpdmlzaW9uMRgwFgYD
                            VQQDEw9UZXN0IENBMjAwMTA1MTcwHhcNMDEwNTE3MTYxMTM2WhcNMDQwMzA2MTYx
                            FIDCfinyz24m
                            -----END CERTIFICATE-----
                            EOF);

        $this->assinaturaDto->expects(self::once())
            ->method('getAlgoritmoHash')
            ->willReturn('SHA256WITHRSA');

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate($this->assinaturaDto, $this->assinaturaEntity, 'transaction'));
    }

    public function testAssinaturaInvalidaMd5(): void
    {
        $this->componenteDigital->expects(self::once())
            ->method('getConteudo')
            ->willReturn('TESTE');

        $this->assinaturaDto->expects(self::once())
            ->method('getAssinatura')
            ->willReturn('098f6bcd4621d373cade4e832627b4f6');

        $this->assinaturaDto->expects(self::exactly(2))
            ->method('getComponenteDigital')
            ->willReturn($this->componenteDigital);

        $this->assinaturaDto->expects(self::exactly(2))
            ->method('getCadeiaCertificadoPEM')
            ->willReturn(<<<EOF
                            -----BEGIN PUBLIC KEY-----
                            MFwwDQYJKoZIhvcNAQEBBQADSwAwSAJBALlTDydScYiT4dao0MJrvUlMkdP31W9c
                            fviaiGppbYsfwLWD5HiGBGBgf4Do0yhKjXXkR37vfOVYBTvSuVf18xMCAwEAAQ==
                            -----END PUBLIC KEY-----
                            -----BEGIN CERTIFICATE-----
                            MIICFTCCAX4CAgECMA0GCSqGSIb3DQEBBAUAMFcxCzAJBgNVBAYTAlVTMRMwEQYD
                            VQQKEwpSVEZNLCBJbmMuMRkwFwYDVQQLExBXaWRnZXRzIERpdmlzaW9uMRgwFgYD
                            -----END CERTIFICATE-----
                            EOF);

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->assinaturaDto->expects(self::once())
            ->method('getAlgoritmoHash')
            ->willReturn('MD5WITHRSA');

        $this->rule->validate($this->assinaturaDto, $this->assinaturaEntity, 'transaction');
    }

    /**
     * @throws RuleException
     */
    public function testAssinaturaRecuperaComponente(): void
    {
        $this->componenteDigitalResource->expects(self::once())
            ->method('download')
            ->willReturn($this->componenteDigital);

        $this->componenteDigital->expects(self::exactly(2))
            ->method('getId')
            ->willReturn(1);

        $this->componenteDigital->expects(self::once())
            ->method('getConteudo')
            ->willReturn('TESTE');

        $this->assinaturaDto->expects(self::once())
            ->method('getAssinatura')
            ->willReturn('bpInItu74S+XciKf6IGjaDtQwnkrjE0EJCmEASDXSSQlUOraoL9MmgeYQL8zvMkKVERsemJArml6UzmJvHqckQ==');

        $this->assinaturaDto->expects(self::exactly(2))
            ->method('getComponenteDigital')
            ->willReturn($this->componenteDigital);

        $this->assinaturaDto->expects(self::exactly(2))
            ->method('getCadeiaCertificadoPEM')
            ->willReturn(<<<EOF
                            -----BEGIN PUBLIC KEY-----
                            MFwwDQYJKoZIhvcNAQEBBQADSwAwSAJBALlTDydScYiT4dao0MJrvUlMkdP31W9c
                            fviaiGppbYsfwLWD5HiGBGBgf4Do0yhKjXXkR37vfOVYBTvSuVf18xMCAwEAAQ==
                            -----END PUBLIC KEY-----
                            -----BEGIN CERTIFICATE-----
                            MIICFTCCAX4CAgECMA0GCSqGSIb3DQEBBAUAMFcxCzAJBgNVBAYTAlVTMRMwEQYD
                            VQQKEwpSVEZNLCBJbmMuMRkwFwYDVQQLExBXaWRnZXRzIERpdmlzaW9uMRgwFgYD
                            VQQDEw9UZXN0IENBMjAwMTA1MTcwHhcNMDEwNTE3MTYxMTM2WhcNMDQwMzA2MTYx
                            FIDCfinyz24m
                            -----END CERTIFICATE-----
                            EOF);

        $this->assinaturaDto->expects(self::once())
            ->method('getAlgoritmoHash')
            ->willReturn('MD5WITHRSA');

        $this->rulesTranslate->expects(self::never())
            ->method('throwException')
            ->willThrowException(new RuleException());

        self::assertTrue($this->rule->validate($this->assinaturaDto, $this->assinaturaEntity, 'transaction'));
    }

    public function testAssinaturaAlgoritmoInvalido(): void
    {
        $this->assinaturaDto->expects(self::once())
            ->method('getAssinatura')
            ->willReturn('098f6bcd4621d373cade4e832627b4f6');

        $this->assinaturaDto->expects(self::exactly(2))
            ->method('getCadeiaCertificadoPEM')
            ->willReturn(<<<EOF
                            -----BEGIN PUBLIC KEY-----
                            MFwwDQYJKoZIhvcNAQEBBQADSwAwSAJBALlTDydScYiT4dao0MJrvUlMkdP31W9c
                            fviaiGppbYsfwLWD5HiGBGBgf4Do0yhKjXXkR37vfOVYBTvSuVf18xMCAwEAAQ==
                            -----END PUBLIC KEY-----
                            -----BEGIN CERTIFICATE-----
                            MIICFTCCAX4CAgECMA0GCSqGSIb3DQEBBAUAMFcxCzAJBgNVBAYTAlVTMRMwEQYD
                            VQQKEwpSVEZNLCBJbmMuMRkwFwYDVQQLExBXaWRnZXRzIERpdmlzaW9uMRgwFgYD
                            VQQDEw9UZXN0IENBMjAwMTA1MTcwHhcNMDEwNTE3MTYxMTM2WhcNMDQwMzA2MTYx
                            FIDCfinyz24m
                            -----END CERTIFICATE-----
                            EOF);

        $this->assinaturaDto->expects(self::once())
            ->method('getAlgoritmoHash')
            ->willReturn('SHA1');

        $this->expectException(RuleException::class);
        $this->rulesTranslate->expects(self::once())
            ->method('throwException')
            ->willThrowException(new RuleException());

        $this->rule->validate($this->assinaturaDto, $this->assinaturaEntity, 'transaction');
    }
}
