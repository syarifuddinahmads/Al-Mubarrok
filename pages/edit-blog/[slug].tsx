import { getSession } from 'next-auth/react';
import { useForm } from 'react-hook-form';
import { useRouter } from 'next/router';
import EditForm from '../../components/EditForm';
import Container from '../../components/base/Container';
import prisma, { blogSelect } from 'lib/prisma';
import SignIn from 'components/SignIn';
import AppNavbar from 'layouts/AppNavbar';
import { fetcher } from 'lib/utils';
import CustomDomain from 'components/CustomDomain';

export default function Index({ blog, session }: any) {
  const { register, handleSubmit, setValue, watch, control } = useForm({
    defaultValues: blog
  });
  const router = useRouter();

  if (!session) {
    return <SignIn />;
  }

  const onSubmitForm = async (values: any) => {
    await fetcher('/api/update-blog', {
      body: JSON.stringify({ ...values, id: blog.id, settingData: values?.settingData }),
      headers: {
        'Content-Type': 'application/json'
      },
      method: 'POST'
    });

    router.reload();
  };

  const editFormProps = {
    blog,
    register,
    handleSubmit,
    setValue,
    watch,
    onSubmitForm,
    control
  };

  return (
    <>
      <AppNavbar />
      <div className="py-16 bg-gray-50">
        <Container small>
          <div className="space-y-8">
            <EditForm {...editFormProps} />
            <CustomDomain blog={blog} />
          </div>
        </Container>
      </div>
    </>
  );
}

export const getServerSideProps = async (context: any) => {
  const { slug } = context.query;

  const session = await getSession(context);

  if (!session?.user?.email) {
    return {
      props: {
        session: null,
        blog: null
      }
    };
  }

  const blog = await prisma.blogWebsite.findFirst({
    where: { slug },
    select: { ...blogSelect, id: true }
  });

  return {
    props: {
      session,
      blog
    }
  };
};